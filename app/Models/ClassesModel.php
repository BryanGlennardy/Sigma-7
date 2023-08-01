<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassesModel extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'id';


    // get semua data classes
    public function getClasses()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM classes");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return $query->getResultArray();
    }

    // get semua data classes berdasarkan id 
    public function getClassesById($id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM classes WHERE id = :id:";
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
