<?php

namespace App\Controllers;
use App\Models\Akun_m;
class Login extends BaseController
{
    public function __construct()
    {
        $this->Akun_m = new Akun_m();
    }
    public function index()
    {
        return view('Login/index');
    }

    public function CekLogin()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        //$dataLogin = $this->Akun_m->CekAkun($username, $password)->getRow();
        $dataLogin = $this->Akun_m->where('username', 'faizin')->first();
        if($dataLogin){
            $pass = $dataLogin['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                if($dataLogin['keterangan'] == "aktif")
                {
                    //dd($dataLogin->keterangan);
                    $newdata = [
                        'id_user'  => $dataLogin['id_user'],
                        'username'  => $dataLogin['username'],
                        'nama'     => $dataLogin['nama_user'],
                        'level'     => $dataLogin['level'],
                        'logged_in' => TRUE
                    ];
                    $session->set($newdata);
                    if(!empty($newdata)){
                        session()->setFlashdata('success','Anda Berhasil Login');
                    }
                return redirect()->to('Home');
                }else{
                    session()->setFlashdata('error','Akun Anda DI BLOKIR');
                    return redirect()->to('Login');
                }
            }else{
                session()->setFlashdata('error','Anda Gagal Login');
                return redirect()->to('Login');
            }
        }else{
            session()->setFlashdata('error','Anda Gagal Login, Username Tidak Terdaftar');
            return redirect()->to('Login');
        }
    }
    public function Logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('Login');
    }
}
