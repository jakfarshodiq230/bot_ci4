<?php

namespace App\Controllers;
use App\Models\Matakuliah_m;
use App\Models\Semester_m;
use App\Models\Tahun_m;
class Matakuliah extends BaseController
{
    protected $Matakuliah_m;
    public function __construct()
    {
        $this->Matakuliah_m = new Matakuliah_m();
        $this->Semester_m = new Semester_m();
        $this->Tahun_m = new Tahun_m();
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'joinmatakuliah' => $this->Matakuliah_m->joinMatakuliah(),
                    //'matakuliah' => $this->Matakuliah_m->paginate(10),
                    //'pager' => $this->Matakuliah_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 10)
                ];
            //dd($data);
            return view('Matakuliah/index',['data'=>$data]
            );
        }
    }

    public function tambah()
    {
            $data = [
                'semester' => $this->Semester_m->getSemester(),
                'tahun' => $this->Tahun_m->getTahun(),
            ];
        return view('Matakuliah/tambah',['data' =>$data]);
    }
    public function add()
    {
        // if (!$this->validate([
        //     'Matakuliah' => [
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
                'id_makul'        => $this->Matakuliah_m->idMatakuliah(),
                'nama_makul'       => $this->request->getPost('matakuliah'),
                'standart_nilai	'       => $this->request->getPost('standartnilai'),
                'id_sem	'       => $this->request->getPost('semester'),
                'id_ta	'       => $this->request->getPost('tahunajaran')
            );
            
            $simpan= $this->Matakuliah_m->saveMatakuliah($data);
                if(!empty($simpan)){
                    session()->setFlashdata('success','Anda Berhasil Tambah Matakuliah');
                }else{
                    session()->setFlashdata('error','Anda Gagal Tambah Matakuliah');
                }
            return redirect()->to('/Matakuliah');
        // }
        
    }
    public function edit($id)
    {
         $dataSem = $this->Matakuliah_m->getMatakuliah($id)->getRow();
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
         $data=[
            'matakuliah' => $dataSem,
            'semester' => $this->Semester_m->getSemester(),
            'tahun' => $this->Tahun_m->getTahun(),
        ];
        //  print_r($dataSem);
        return view('Matakuliah/edit', ['data' => $data]);
    }

    public function Update($id)
    {
            $Update= $this->Matakuliah_m->update($id, [
                'nama_makul'    => $this->request->getPost('matakuliah'),
                'standart_nilai'=> $this->request->getPost('standartnilai'),
                'id_sem	'       => $this->request->getPost('semester'),
                'id_ta	'       => $this->request->getPost('tahunajaran')
                
            ]);
                if(!empty($Update)){
                    session()->setFlashdata('success','Anda Berhasil Update Matakuliah');
                }else{
                    session()->setFlashdata('error','Anda Gagal Update Matakuliah');
                }
            return redirect()->to('/Matakuliah');
    }

    function delete($id)
    {
        $Matakuliah = $this->Matakuliah_m->find($id);
        if (empty($Matakuliah)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $delete= $this->Matakuliah_m->delete($id);
        if(!empty($delete)){
            session()->setFlashdata('success','Anda Berhasil Delete Matakuliah');
        }else{
            session()->setFlashdata('error','Anda Gagal Delete Matakuliah');
        }
        return redirect()->to('/Matakuliah');
    }

    public function importExcel()
	{
         return view('Matakuliah/import');
    }
    public function prosesExcel()
	{
        $db = \Config\Database::connect();
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
				//echo $row[0];
				$id_matakuliah = $row[0];
				$nama_makul = $row[1];
				$standart_nilai = $row[2];
                $id_sem = $row[3];
                $id_ta = $row[4];
				$simpandata = [
					'id_makul' => $id_matakuliah,
                     'nama_makul' => $nama_makul,
                     'standart_nilai'=> $standart_nilai, 
                     'id_sem'=> $id_sem,
                     'id_ta'=> $id_ta
                ];
                //print_r($simpandata);
				$import = $db->table('makul')->insert($simpandata);
				if(!empty($import)){
                    session()->setFlashdata('success','Anda Berhasil Import Matakuliah');
                }else{
                    session()->setFlashdata('error','Anda Gagal Import Matakuliah');
                } 
		}
			
			return redirect()->to('/Matakuliah');		
			
	}

    public function DownlodFormat(){
        $file = "FormatImport/mahasiswa.xlsx";
        return $this->response->download($file, null);
        //force_download(base_url($data), NULL);
    }
}