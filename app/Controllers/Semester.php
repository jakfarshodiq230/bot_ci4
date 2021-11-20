<?php

namespace App\Controllers;
use App\Models\Semester_m;
class Semester extends BaseController
{
    protected $Semester_m;
    public function __construct()
    {
        $this->Semester_m = new Semester_m();
        $this->session= session();
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'semester' => $this->Semester_m->paginate(10),
                    'pager' => $this->Semester_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 10),
                ];
            session()->get();
            return view('Semester/index',$data);
        }
    }

    public function tambah()
    {
        session()->get();
        return view('Semester/tambah');
    }
    public function add()
    {
            session()->get();
            $data = array(
                'id_sem'        => $this->Semester_m->idSemester(),
                'nama_sem'       => $this->request->getPost('semester'),
                'keterangan' => $this->request->getPost('keterangan'),
            );
            $simpan= $this->Semester_m->saveSemester($data);
            if(!empty($simpan)){
                session()->setFlashdata('success','Anda Berhasil Tamabah Semester');
            }else{
                session()->setFlashdata('error','Anda Gagal Tamabah Semester');
            }
            return redirect()->to('/Semester');
        
    }
    public function edit($id)
    {
         $dataSem = $this->Semester_m->getSemester($id)->getRow();
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data= [
            'semester' => $dataSem
        ];
        session()->get();
        return view('Semester/edit',$data);
    }

    public function Update($id)
    {
            $update = $this->Semester_m->update($id, [
                'nama_sem'       => $this->request->getPost('semester'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);
            if(!empty($update)){
                session()->setFlashdata('success','Anda Berhasil Update Semester');
            }else{
                session()->setFlashdata('error','Anda Gagal Update Semester');
            }
            session()->get();
            return redirect()->to('/Semester');
    }

    function delete($id)
    {
        $Semester = $this->Semester_m->find($id);
        if (empty($Semester)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Semester Tidak ditemukan !');
        }
        $hapus = $this->Semester_m->delete($id);
            if(!empty($hapus)){
                session()->setFlashdata('success','Anda Berhasil Delete Semester');
            }else{
                session()->setFlashdata('error','Anda Gagal Delete Semester');
            }
            session()->get();
        return redirect()->to('/Semester');
    }
}