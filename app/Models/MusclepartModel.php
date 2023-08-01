<?php

namespace App\Models;

use CodeIgniter\Model;

class MusclepartModel extends Model
{
    protected $table = 'musclepart';
    protected $primaryKey = 'id';

    // get semua data musclepart
    public function getMuscleparts()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM musclepart");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return $query->getResultArray();
    }

    // get semua data musclepart berdasarkan id 
    public function getMusclepartById($id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM musclepart WHERE id = :id:";
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
