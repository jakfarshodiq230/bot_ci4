<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Matakuliah_m extends Model
{
    protected $table = 'makul';
    protected $primaryKey = 'id_makul';

    //protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_makul', 'standart_nilai','id_sem','id_ta'];
    public function getMatakuliah($id = false)
    {
        if ($id == false) {
           return $this->findAll();
        }else{
            return $this->getWhere(['id_makul' => $id]);
        }
        
    }
    public function idMatakuliah()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_makul,4)) AS kd_max FROM makul ");
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
        return date('dmy').'MK'.$kd;  
    }
    public function saveMatakuliah($data)
    {
       $query = $this->db->table('makul')->insert($data);
        return $query;
    }
    public function joinMatakuliah()
    {
        $db = \Config\Database::connect();
            $builder = $db->table('makul');
            $builder->select('makul.id_makul,makul.nama_makul,makul.standart_nilai, nama_sem, nama_ta');
            $builder->join('semester', 'semester.id_sem = makul.id_sem ');
            $builder->join('tahun_ajaran', 'tahun_ajaran.id_ta=makul.id_ta');
            $builder->groupBy('id_makul');
            $query = $builder->get();
            return  $query->getResult();
    }

    public function cekMK($id_makul)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('makul');
        // $builder->select('makul.*, nama_sem', 'nama_ta');
        // $builder->join('semester', 'semester.id_sem=makul.id_sem');
        // $builder->join('tahun_ajaran', 'tahun_ajaran.id_ta=makul.id_ta');
        // $builder->where('makul.id_makul', $id_makul);
        // $query = $builder->get();
        // foreach ($query->Result() as $data) {
        //         $data=array(
        //             'id_makul' => $data->id_makul,
        //             'nama_makul' => $data->nama_makul,
        //             'nama_sem' => $data->nama_sem,
        //             'id_ta' => $data->id_ta,
        //             'nama_ta' => $data->nama_ta,
        //             );
        //         return  $data;
        //     }
        
        $hsl=$this->db->query("SELECT
    *
FROM
    makul,
    semester,
    tahun_ajaran
WHERE
    semester.id_sem = makul.id_sem AND tahun_ajaran.id_ta = makul.id_ta AND makul.id_makul = '$id_makul'");
            foreach ($hsl->getResult() as $data) {
                $data=array(
                    'id_makul' => $data->id_makul,
                    'nama_makul' => $data->nama_makul,
                    'nama_sem' => $data->nama_sem,
                    'id_ta' => $data->id_ta,
                    'nama_ta' => $data->nama_ta,
                    );
                    return $data;
            }
            
    
}

 
}