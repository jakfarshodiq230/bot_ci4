<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Tahun_m extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_ta';

    //protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_ta'];
    public function getTahun($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_ta' => $id]);
        }
        
    }
    public function idTahun()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_ta,4)) AS kd_max FROM tahun_ajaran");
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
        return date('dmy').'TA'.$kd;  
    }
    public function saveTahun($data)
    {
       $query = $this->db->table('tahun_ajaran')->insert($data);
        return $query;
    }
 
}