<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Nilai_m extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = ['nim', 'id_nilai','nilai','tanggal_her'];
    public function getNilai($id = false)
    {
        if ($id == false) {
           return $this->findAll();
        }else{
            return $this->getWhere(['id_nilai' => $id]);
        }
        
    }
    public function idNilai()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_nilai,4)) AS kd_max FROM nilai ");
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
        return date('dmy').'NI'.$kd;  
    }
    public function saveNilai($data)
    {
       $query = $this->db->table('nilai')->insert($data);
        return $query;
    }
    public function joinNilai($id = false)
    {
            $db      = \Config\Database::connect();
            if($id == false){
                // $builder = $db->table('nilai');
                // $builder->select('*');
                // $builder->join('makul', 'makul.id_makul=nilai.id_makul', 'lefth');
                // $builder->join('semester', 'makul.id_sem=semester.id_sem ');
                // $builder->join('tahun_ajaran', 'makul.id_ta=tahun_ajaran.id_ta');
                $builder = $db->query('SELECT * FROM nilai, makul, semester,tahun_ajaran WHERE nilai.id_makul=makul.id_makul
                 AND semester.id_sem=makul.id_sem AND tahun_ajaran.id_ta=makul.id_ta GROUP BY id_nilai');
                return $query   = $builder;
            }else{
                $builder = $db->table('nilai');
                $builder->select('*');
                $builder->join('makul', 'makul.id_makul=nilai.id_makul ');
                $builder->join('semester', 'semester.id_sem = makul.id_sem ');
                $builder->join('tahun_ajaran', 'tahun_ajaran.id_ta=makul.id_ta');
                $builder->Where(['id_nilai' =>$id]);
                return $query   = $builder->get();
            }
    }
 
}