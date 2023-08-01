<?php

namespace App\Models;

use CodeIgniter\Model;

class IntensityModel extends Model
{
    protected $table = 'intensity';
    protected $primaryKey = 'id';

    // get semua data intensity
    public function getIntensities()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM intensity");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return $query->getResultArray();
    }

    // get semua data intensity berdasarkan id 
    public function getIntensityById($id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM intensity WHERE id = :id:";
        $data  = [
            'id' => $id
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getRowArray();
        }
    }
}
