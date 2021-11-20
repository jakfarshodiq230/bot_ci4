<?php

namespace App\Controllers;
use App\Models\Bot_m;
class Bot_nilai extends BaseController
{
    protected $Bot_m;
    public function __construct()
    {
        $this->Bot_m = new Bot_m();
        
    }
    public function index(){

         if(session('username') == ''){
            return view('Login/index');
        }else{
            $data = [
                    'bot' => $this->Bot_m->paginate(3),
                    'pager' => $this->Bot_m->pager,
                    'nomor' => nomor($this->request->getVar('page'), 3)
                ];
        return view('Bot/index',[
                'data' => $data]);
        }
    }
    public function add(){
        return view('Bot/tambah');
    }
    public function addSave(){
        //dd($this->Bot_m->idBOT());
        $data = array(
            'id_bot'        => $this->Bot_m->idBOT(),
            'username_bot'       => $this->request->getPost('username_bot'),
            'api_token'       => $this->request->getPost('api_bot'),
            'url_bot'       => $this->request->getPost('url_bot'),
            'id_user'       => session('id_user')
        );
        
        $simpan= $this->Bot_m->saveBOT($data);
            if(!empty($simpan)){
                session()->setFlashdata('success','Anda Berhasil Tambah BOT');
            }else{
                session()->setFlashdata('error','Anda Gagal Tambah BOT');
            }
        return redirect()->to('/Bot_nilai');
    }
    public function delete($id){
        $Bot = $this->Bot_m->find($id);
        if (empty($Bot)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $delete= $this->Bot_m->delete($id);
            if(!empty($delete)){
                session()->setFlashdata('success','Anda Berhasil Delete Data BOT');
            }else{
                session()->setFlashdata('error','Anda Gagal Data BOT');
            }
        return redirect()->to('/Bot_nilai');
    }
    public function edit($id)
    {
         $dataSem = $this->Bot_m->find($id);
        if (empty($dataSem)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data['bot'] = $dataSem;
        return view('Bot/edit',$data);
    }
    public function update($id){
        $update = $this->Bot_m->update($id, [
            'username_bot'       => $this->request->getPost('username_bot'),
            'api_token'       => $this->request->getPost('api_bot'),
            'url_bot'       => $this->request->getPost('url_bot'),
            'id_user'       => session('id_user')
        ]);
        if(!empty($update)){
            session()->setFlashdata('success','Anda Berhasil Update BOT');
        }else{
            session()->setFlashdata('error','Anda Gagal Update BOT');
        }
            return redirect()->to('/Bot_nilai');
    }
    public function SetingStatus(){
        $id= $this->request->getPost('id_bot');
        $update2 = $this->Bot_m->update($id, [
            'status'       => $this->request->getPost('status'),
        ]);
        if(!empty($update2))
        {
            //require APPPATH.'views/vendor/autoload.php';
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new \Pusher\Pusher(
                '201794f311ff9c368035',
                'bff099eee407149184c2',
                '1297343',
                $options
            );

            $data['message'] = 'success';
            $pusher->trigger('bot', 'my-event', $data);
       }
    }

    public function DetailBOT(){
        echo json_encode($this->Bot_m->BotAll());
    }

    public function DetailBOT2(){
        $id_bot= $this->request->getPost('id_bot');
        echo json_encode($this->Bot_m->BotAll($id_bot));
    }
}