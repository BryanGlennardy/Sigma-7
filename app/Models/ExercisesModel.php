<?php

namespace App\Models;

use CodeIgniter\Model;

class ExercisesModel extends Model
{
    protected $table = 'exercises';
    protected $primaryKey = 'id';


    // get semua data exercises
    public function getExercises()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM exercises");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return $query->getResultArray();
    }

    // get semua data exercises berdasarkan id 
    public function getExercisesById($id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM exercises WHERE id = :id:";
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

    // get semua data exercises berdasarkan bagian otot
    public function getExercisesByMusclepartNoDupe($musclepart_id)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM exercises WHERE musclepart_id = :musclepart_id: AND class_id = 'C0001'";
        $data  = [
            'musclepart_id' => $musclepart_id
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getResultArray();
        }
    }
}
