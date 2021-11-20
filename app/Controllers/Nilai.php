<?php

namespace App\Controllers;
use App\Models\Nilai_m;
use App\Models\Semester_m;
use App\Models\Tahun_m;
use App\Models\Matakuliah_m;
use App\Models\Mahasiswa_m;
class Nilai extends BaseController
{
    protected $Nilai_m;
    public function __construct()
    {
        $this->Nilai_m = new Nilai_m();
        $this->Semester_m = new Semester_m();
        $this->Tahun_m = new Tahun_m();
        $this->Matakuliah_m = new Matakuliah_m();
        $this->Mahasiswa_m = new Mahasiswa_m();
        
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'pager' => $this->Nilai_m->paginate(10),
                    'nilai' => $this->Nilai_m->joinNilai()->getResult(),
                    'standart' =>$this->Matakuliah_m->getMatakuliah(),
                    'pager' => $this->Nilai_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 10)
                ];
            //$data['nilai'] = $this->Nilai_m->joinNilai()->getResult();
            return view('Nilai/index',['data'=>$data]);
        }
    }

    public function tambah()
    {
            $data['matakuliah']= $this->Matakuliah_m->getMatakuliah();
        return view('Nilai/tambah',$data);
    }
    public function add()
    {

            $data = array(
                'id_nilai'        => $this->Nilai_m->idNilai(),
                'nim'       => $this->request->getPost('nim'),
                'id_makul	'       => $this->request->getPost('matakuliah'),
                'nilai	'       => $this->request->getPost('nilai'),
                'tanggal_her'       => $this->request->getPost('tanggalher'),
                'id_user'       => session('id_user')
            );
            
            $simpan= $this->Nilai_m->saveNilai($data);
                if(!empty($simpan)){
                    session()->setFlashdata('success','Anda Berhasil Tambah Nilai');
                }else{
                    session()->setFlashdata('error','Anda Gagal Tambah Nilai');
                }
            return redirect()->to('/Nilai');
        
    }
    public function edit($id)
    {
         //$dataSem = $this->Nilai_m->getNilai($id)->getRow();
         $dataSem = $this->Nilai_m->joinNilai($id)->getRow();
         //dd($dataSem);
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
         $data=[
            'nilai' => $dataSem,
            'matakuliah' => $this->Matakuliah_m->getMatakuliah(),
        ];
        return view('Nilai/edit', ['data' => $data]);
    }

    public function Update($id)
    {
            $update = $this->Nilai_m->update($id, [
                'nim'    => $this->request->getPost('nim'),
                'nilai'=> $this->request->getPost('nilai'),
                'id_makul	'       => $this->request->getPost('matakuliah'),
                'tanggal_her	'       => $this->request->getPost('tanggalher')
                
            ]);
                if(!empty($update)){
                    session()->setFlashdata('success','Anda Berhasil Update Nilai');
                }else{
                    session()->setFlashdata('error','Anda Gagal Update Nilai');
                }
            return redirect()->to('/Nilai');
    }

    function delete($id)
    {
        $Nilai = $this->Nilai_m->find($id);
        if (empty($Nilai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $delete= $this->Nilai_m->delete($id);
        if(!empty($delete)){
            session()->setFlashdata('success','Anda Berhasil Delete Nilai');
        }else{
            session()->setFlashdata('error','Anda Gagal Delete Nilai');
        }
        return redirect()->to('/Nilai');
    }

    public function importExcel()
	{
         return view('Nilai/import');
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
				$id_Nilai = $this->Nilai_m->idNilai();
				$nim = $row[0];
				$nilai = $row[1];
                $id_makul = $row[2];
                $tanggal_her = $row[3];
				$simpandata = [
					'id_nilai' => $id_Nilai,
                     'nim' => $nim,
                     'nilai'=> $nilai, 
                     'id_makul'=> $id_makul,
                     'tanggal_her'=> $tanggal_her
                ];
                //print_r($simpandata);
				$import = $db->table('nilai')->insert($simpandata);
				if(!empty($import)){
                    session()->setFlashdata('success','Anda Berhasil Import Nilai');
                }else{
                    session()->setFlashdata('error','Anda Gagal Import Nilai');
                }
		}
			
			return redirect()->to('/Nilai');		
			
	}
    public function cekMatakuliah()
	{
        $id_makul = $this->request->getPost('id_makul');
        $data= $this->Matakuliah_m->cekMK($id_makul);
        //dd($data);
        echo json_encode($data);
    }

    public function cekMahasiswa()
	{
        $nim = $this->request->getPost('nim');
        $data= $this->Mahasiswa_m->cekMhs($nim);
        //dd($data);
        echo json_encode($data);
    }
    public function DownlodFormat(){
        $file = "FormatImport/nilai.xlsx";
        return $this->response->download($file, null);
        //force_download(base_url($data), NULL);
    }
    
}