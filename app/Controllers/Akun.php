<?php

namespace App\Controllers;
use App\Models\Akun_m;
use App\Libraries\Secure;
class Akun extends BaseController
{
    protected $Akun_m;
    public function __construct()
    {
        $this->Akun_m = new Akun_m();
        $this->secure = new Secure();
    }
    public function index()
    {
        if(session('username') == ''){
            return view('Login/index');
        }else{
        //     $id             = 2020; // data yg akan di enkripsi
        // $encrypt_id     = $this->secure->encrypt_url($id); // mengenkripsi $id
        // $decrypt_id     = $this->secure->decrypt_url($encrypt_id); // mendekripsi $encrypt_id
            $Akun = $this->Akun_m->getAkun();
            $data = [
                    'akun' => $this->Akun_m->paginate(10),
                    'pager' => $this->Akun_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 10)
                ];
            return view('Akun/index', [
                'data' => $data,
            ]);
        }
    }

    public function tambah()
    {
        return view('Akun/tambah');
    }
    public function add()
    {
            $options = [
                'cost' => 10,
            ];
            $data = array(
                'id_user'        => $this->Akun_m->idAkun(),
                'nama_user'       => $this->request->getPost('nama'),
                'username'       => $this->request->getPost('username'),
                'password'       =>password_hash($this->request->getPost('password'), PASSWORD_DEFAULT,$options),
                'email'       => $this->request->getPost('email'),
                'level'       => $this->request->getPost('level'),
                'keterangan' => $this->request->getPost('keterangan'),
            );
            $simpan= $this->Akun_m->saveAkun($data);
                if(!empty($simpan)){
                    session()->setFlashdata('success','Anda Berhasil Tambah Akun');
                }else{
                    session()->setFlashdata('error','Anda Gagal Tambah Akun');
                }
            return redirect()->to('/Akun');
        
    }
    public function edit($id)
    {
        $decrypt_id     = $this->secure->decrypt_url($id);
         $dataSem = $this->Akun_m->getAkun($decrypt_id)->getRow();
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
         $data['akun'] = $dataSem;
        //  print_r($dataSem);
        return view('Akun/edit', $data);
    }

    public function Update($id)
    {
            $decrypt_id     = $this->secure->decrypt_url($id);
            $Update = $this->Akun_m->update($decrypt_id, [
                'nama_user'       => $this->request->getPost('nama'),
                'username'       => $this->request->getPost('username'),
                'email'       => $this->request->getPost('email_user'),
                'level'       => $this->request->getPost('level_user'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);
                if(!empty($Update)){
                    session()->setFlashdata('success','Anda Berhasil Update Akun');
                }else{
                    session()->setFlashdata('error','Anda Gagal Update Akun');
                }
            return redirect()->to('/Akun');
    }

    function delete($id)
    {
        $decrypt_id     = $this->secure->decrypt_url($id);
        $Akun = $this->Akun_m->find($decrypt_id);
        if (empty($Akun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $Delete = $this->Akun_m->delete($decrypt_id);
                if(!empty($Delete)){
                    session()->setFlashdata('success','Anda Berhasil Delete Akun');
                }else{
                    session()->setFlashdata('error','Anda Gagal Delete Akun');
                }
        return redirect()->to('/Akun');
    }
}