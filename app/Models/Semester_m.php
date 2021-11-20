<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Semester_m extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'id_sem';

    //protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_sem', 'keterangan'];
    public function getSemester($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_sem' => $id]);
        }
        
    }
    public function idSemester()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_sem,4)) AS kd_max FROM semester ");
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
        return date('dmy').'SM'.$kd;  
    }
    public function saveSemester($data)
    {
       $query = $this->db->table('semester')->insert($data);
        return $query;
    }
 
}