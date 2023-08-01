<?php

namespace App\Models;

use CodeIgniter\Model;

class FrequencyModel extends Model
{
    protected $table = 'frequency';
    protected $primaryKey = 'id';

    // get semua data frequency
    public function getFrequencies()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM frequency");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return $query->getResultArray();
    }

    // get semua data frequency berdasarkan id 
    public function getFrequencyById($id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM frequency WHERE id = :id:";
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
