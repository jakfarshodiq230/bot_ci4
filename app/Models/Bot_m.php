<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Bot_m extends Model
{
    protected $table = 'bot';
    protected $primaryKey = 'id_bot';

    //protected $useAutoIncrement = true;
    protected $allowedFields = ['id_bot','username_bot','api_token', 'url_bot', 'status','id_user'];
    public function idBOT()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_bot,4)) AS kd_max FROM bot ");
        $kd = "";
        if($q->getNumRows()>0){
            foreach($q->getResult() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').'BT'.$kd;  
    }
    public function saveBOT($data)
    {
       $query = $this->db->table('bot')->insert($data);
        return $query;
    }
    public function BotAll($id = false){
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_bot' => $id]);
        }
    }
    public function ALL(){
        $db = \Config\Database::connect();
        $builder = $db->query("SELECT * FROM nilai, makul, semester, tahun_ajaran, mahasiswa WHERE makul.id_sem = semester.id_sem AND makul.id_ta = tahun_ajaran.id_ta AND nilai.nim = mahasiswa.nim AND nilai.id_makul = makul.id_makul");
         return $query   = $builder;
    }

    public function DETAIL($nim, $sem){
        $db = \Config\Database::connect();
        $builder = $db->query("
            SELECT
                *
            FROM
                nilai,
                makul,
                semester,
                tahun_ajaran,
                mahasiswa
            WHERE
                makul.id_sem = semester.id_sem AND makul.id_ta = tahun_ajaran.id_ta 
                AND nilai.nim = mahasiswa.nim AND nilai.id_makul = makul.id_makul 
                AND mahasiswa.nim= ".$nim." AND semester.nama_sem=".$sem."
        ");
        return $builder;
    }

    // public function nitifPusher(){
    //     require APPPATH.'views/vendor/autoload.php';
    //     $app_id = '1297343';
    //     $app_key = '201794f311ff9c368035';
    //     $app_secret = 'bff099eee407149184c2';
    //     $app_cluster = 'ap1';

    //     $options = [
    //     'cluster' => $app_cluster ,
    //     'useTLS' => true
    //     ];

    //     $pusher = new  Pusher\Pusher( $app_key , $app_secret , $app_id , $options );
    //     $data['message'] = 'success';
    //     $pusher->trigger('my-channel', 'my-event', $data);
    // }
}