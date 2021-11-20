<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Mahasiswa_m extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';

    //protected $useAutoIncrement = true;
    protected $allowedFields = ['nama','tahun_angkatan', 'keterangan'];
    public function getMahasiswa($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['nim' => $id]);
        }
        
    }

    public function saveMahasiswa($data)
    {
       $query = $this->db->table('mahasiswa')->insert($data);
        return $query;
    }

    public function cekMhs($nim){
        $hsl=$this->db->query("SELECT
            *
        FROM
            mahasiswa
        WHERE
            nim = '$nim'");
            foreach ($hsl->getResult() as $data) {
                $data=array(
                    'nim' => $data->nim,
                    'nama' => $data->nama,
                    );
                    return $data;
            }
    }
 
}