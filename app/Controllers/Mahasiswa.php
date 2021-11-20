<?php

namespace App\Controllers;
use App\Models\Mahasiswa_m;
class Mahasiswa extends BaseController
{
    protected $Mahasiswa_m;
    public function __construct()
    {
        $this->Mahasiswa_m = new Mahasiswa_m();
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'mahasiswa' => $this->Mahasiswa_m->getMahasiswa(),
                    //'pager' => $this->Mahasiswa_m->pager,
                    //'nomor' => nomor($this->request->getVar('page'), 10)
                ];
            return view('Mahasiswa/index', [
                'data' => $data
            ]);
        }
    }

    public function tambah()
    {
        $session = session();
        return view('Mahasiswa/tambah');
    }
    public function add()
    {
        // if (!$this->validate([
        //     'Mahasiswa' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ],
        //     'keterangan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} Harus diisi'
        //         ]
        //     ]
        // ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // } else {
            $data = array(
                'nim'        => $this->request->getPost('nim'),
                'nama'       => $this->request->getPost('nama'),
                'tahun_angkatan'       => $this->request->getPost('tahunangkatan'),
                'keterangan' => $this->request->getPost('keterangan'),
            );
            $simpan = $this->Mahasiswa_m->saveMahasiswa($data);
            if(!empty($simpan)){
                session()->setFlashdata('success','Anda Berhasil Tamabah Mahasiswa');
            }else{
                session()->setFlashdata('error','Anda Gagal Tamabah Mahasiswa');
            }
            return redirect()->to('/Mahasiswa');
        // }
        
    }
    public function edit($id)
    {
        $session = session();
         $dataSem = $this->Mahasiswa_m->getMahasiswa($id)->getRow();
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        return view('Mahasiswa/edit',['mahasiswa'=> $dataSem]);
    }

    public function Update($id)
    {
            $session = session();
            $update= $this->Mahasiswa_m->update($id, [
                'nama_sem'       => $this->request->getPost('Mahasiswa'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);
            if(!empty($update)){
                session()->setFlashdata('success','Anda Berhasil Update Mahasiswa');
            }else{
                session()->setFlashdata('error','Anda Gagal Update Mahasiswa');
            }
            return redirect()->to('/Mahasiswa');
    }

    function delete($id)
    {
        $session = session();
        $Mahasiswa = $this->Mahasiswa_m->find($id);
        if (empty($Mahasiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $delete= $this->Mahasiswa_m->delete($id);
            if(!empty($delete)){
                session()->setFlashdata('success','Anda Berhasil Delete Mahasiswa');
            }else{
                session()->setFlashdata('error','Anda Gagal Delete Mahasiswa');
            }
        return redirect()->to('/Mahasiswa');
    }

    public function importExcel()
	{
        $session = session();
         return view('Mahasiswa/import',[]);
    }
    public function prosesExcel()
	{
        $session = session();
		$file_excel = $this->request->getFile('fileexcel');
		$ext = $file_excel->getClientExtension();
			if($ext == 'xls') {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($file_excel);
	
			$data = $spreadsheet->getActiveSheet()->toArray();
			foreach($data as $x => $row) {
				if ($x == 0) {
					continue;
				}
				
				$nim = $row[0];
				$nama = $row[1];
				$tahun_angkatan = $row[2];
                $keterangan = $row[3];
	
				$db = \Config\Database::connect();

				$cekNIM = $db->table('mahasiswa')->getWhere(['nim'=>$nim])->getResult();

				if(count($cekNIM) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
				} else {
	
				$simpandata = [
					'nim' => $nim, 'nama' => $nama, 'tahun_angkatan'=> $tahun_angkatan,'keterangan'=>$keterangan
				];
	
				$import = $db->table('mahasiswa')->insert($simpandata);
				if($import){
                    session()->setFlashdata('success','Anda Berhasil Import Mahasiswa');
                }else{
                    session()->setFlashdata('error','Anda Gagal Import Mahasiswa');
                }
			}
		}
			
			return redirect()->to('/Mahasiswa');
	}
    public function DownlodFormat(){
        $file = "FormatImport/mahasiswa.xlsx";
        return $this->response->download($file, null);
        //force_download(base_url($data), NULL);
    }
}