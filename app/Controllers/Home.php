<?php

namespace App\Controllers;
use App\Models\Mahasiswa_m;
use App\Models\Tahun_m;
use App\Models\Matakuliah_m;
use App\Models\Akun_m;
class Home extends BaseController
{
    public function __construct()
    {
        $this->Mahasiswa_m = new Mahasiswa_m();
        $this->Tahun_m = new Tahun_m();
        $this->Matakuliah_m = new Matakuliah_m();
        $this->Akun_m = new Akun_m();
    }
    public function index()
    {
        $session = session();
        
        if($session->get('username') == ''){
            return view('Login/index');
        }else{
            $data=[
                'mahasiswa' => $this->Mahasiswa_m->countAllResults(),
                'tahun_ajaran' => $this->Tahun_m->countAllResults(),
                'matakuliah' => $this->Matakuliah_m->countAllResults(),
                'akun' => $this->Akun_m->countAllResults(),
            ];
            session()->setFlashdata('null','null');
            return view('Dashbort/home',['session'=>$session->get(),'data'=>$data]);
        }
    }
}
