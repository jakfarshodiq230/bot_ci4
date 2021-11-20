<?php
namespace App\Controllers;
use App\Models\Bot_m;
class CatBot extends BaseController
{
    protected $Bot_m;
    public function __construct()
    {
        $this->Bot_m = new Bot_m();
        
    }
    public function index()
    {
        $TOKEN = "2093405295:AAGVt0RXk2Xu_yeKS0eoV1xEYjuKq6QeG9E";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        if (!empty($update))
        {
            $chatID = $update["message"]["chat"]["id"];
            $message = $update["message"]["text"];
            if (strpos($update["message"]["text"], "/start") === 0) 
            {
                $pesan= "<b>😍Halo selamat datang ".$update["message"]["from"]["first_name"]."</b>Aku adalah Bots otomatis yang dibuat oleh ShodiqTECH dan aku bisa membalas dan menjawab semua pesan yang kamu kirimkan. Ayoo mau tanya apa sama ku?";
                file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".urlencode($pesan)."&parse_mode=HTML"); 
            exit;
            }else{
            // tutup /start
                $cek= $message;
                $pisah = explode(" ",$cek);
                $data= $this->Bot_m->ALL();
                $text='';
                foreach ($data->getResult('array') as $rowM)
                {
                    
                    if ($pisah[0] == $rowM["nim"])
                    {
                            $nim = $pisah[0]; 
                            if($pisah[1] == $rowM['nama_sem']){
                                $sem = $pisah[1]; 
                                $dataBOT= $this->Bot_m->DETAIL($nim, $sem);
                                foreach ($dataBOT->getResult('array') as $row)
                                {
                                        $keterangan= "";
                                        $tanggalHer= "";

                                        if($row['nilai'] >= $row['standart_nilai']){
                                            $keterangan =" LULUS ";
                                            $tanggalHer= "-";
                                        }else {
                                            $keterangan =" TIDAK LULUS ";
                                            $tanggalHer= $row['tanggal_her'];
                                        }
                                        $data= array (
                                                    //array (
                                                        0=>$row['nim'],
                                                        1=>$row['nama_makul'],
                                                        2=>$row['nilai'],
                                                        3=>$row['nama_ta'],
                                                        4=>$tanggalHer,
                                                        5=>$keterangan,
                                                    );
                                                //);
                                        $text= "HASIL UJIAN ANDA TAHUN AJARAN ".$data[3]."\nMatakuiah : ".$data[1]."\nNilai : ".$data[2]."\nKeterangan : ".$data[5]."\nTanggal Her : ".$data[4];
                                file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".urlencode($text)."&parse_mode=HTML");
                                }
                            }else{
                                $text = "Pastikan anda menulis seperti ini <b>NIM</b> sepasi <b>Semester Aktif</b> atau <b>Semester</b> anda belum aktif";
                                file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".urlencode($text)."&parse_mode=HTML");
                            }  
                        // tutup cek nim
                    }else{
                            $text = $cek." Tidak Terdaftar di Database Akademik Cp Operator Akademik";
                            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".urlencode($text)."&parse_mode=HTML");
                        }
                    // tutup rowM2
                    exit;
                }
            }
        // tutup update
        }
    }
}