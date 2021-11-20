<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Akun_m extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'id_user';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    protected $allowedFields = ['nama_user', 'username','password','email','level','keterangan'];
    public function getAkun($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_user' => $id]);
        }
        
    }
    public function idAkun()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_user,4)) AS kd_max FROM login ");
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
        return date('dmy').'AK'.$kd;  
    }
    public function saveAkun($data)
    {
       $query = $this->db->table('login')->insert($data);
        return $query;
    }

    public function CekAkun($id, $pass)
    {
            return $this->getWhere(['username' => $id, 'password'=> $pass]);
        
    }
 
}