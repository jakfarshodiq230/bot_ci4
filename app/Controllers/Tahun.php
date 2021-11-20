<?php

namespace App\Controllers;
use App\Models\Tahun_m;
class Tahun extends BaseController
{
    protected $Tahun_m;
    public function __construct()
    {
        $this->Tahun_m = new Tahun_m();
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'tahun' => $this->Tahun_m->paginate(10),
                    'pager' => $this->Tahun_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 10)
                ];
            return view('Tahun/index', [
                'data' => $data,
            ]);
        }
    }

    public function tambah()
    {
        return view('Tahun/tambah');
    }
    public function add()
    {
        // if (!$this->validate([
        //     'Tahun' => [
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
                'id_ta'        => $this->Tahun_m->idTahun(),
                'nama_ta'       => $this->request->getPost('tahun')
            );
            $simpan = $this->Tahun_m->saveTahun($data);
            if(!empty($simpan)){
                session()->setFlashdata('success','Anda Berhasil Tamabah Tahun');
            }else{
                session()->setFlashdata('error','Anda Gagal Tamabah Tahun');
            }
            return redirect()->to('/Tahun');
        // }
        
    }
    public function edit($id)
    {
         $dataSem = $this->Tahun_m->getTahun($id)->getRow();
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
         $data['tahun'] = $dataSem;
        //  print_r($dataSem);
        return view('Tahun/edit', $data);
    }

    public function Update($id)
    {
            $update = $this->Tahun_m->update($id, [
                'nama_ta'       => $this->request->getPost('tahun'),
            ]);
            if(!empty($update)){
                session()->setFlashdata('success','Anda Berhasil Update Tahun');
            }else{
                session()->setFlashdata('error','Anda Gagal Update Tahun');
            }
            return redirect()->to('/Tahun');
    }

    function delete($id)
    {
        $Tahun = $this->Tahun_m->find($id);
        if (empty($Tahun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $delete = $this->Tahun_m->delete($id);
            if(!empty($delete)){
                session()->setFlashdata('success','Anda Berhasil Delete Tahun');
            }else{
                session()->setFlashdata('error','Anda Gagal Delete Tahun');
            }
        return redirect()->to('/Tahun');
    }
}