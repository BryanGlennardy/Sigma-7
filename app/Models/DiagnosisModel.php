<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosisModel extends Model
{
    protected $table = 'diagnosis';
    protected $primaryKey = 'id';

    public function getDiagnosis($data)
    {
        $bmi = $this->getBMI($data['height'], $data['weight']);
        $musclepart = $this->getMusclepartId($data['bagianotot']);

        $result = [
            'bmi' => $bmi,
            'class' => $this->getClassId($data['gender'], $musclepart, $data['specific']),
            'musclepart' => $musclepart,
            'intensity' => $this->getIntensityId($data['atlet']),
            'frequency' => $this->getFrequencyId($bmi)
        ];

        return $result;
    }

    // get semua data diagnosis berdasarkan email
    public function getDetailDiagnosisUser($emailUser)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM diagnosis WHERE user_email = :email:";
        $data  = [
            'email' => $emailUser
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

    public function getBMI($height, $weight)
    {
        $height /= 100;
        $bmi = $weight / ($height * $height);
        return number_format($bmi, 2);
    }

    public function getClassId($gender, $musclepartId, $count)
    {
        if ($musclepartId == "M0001") {
            if ($count < 60) return "C0001";
            else if ($count >= 60 && $count <= 120) return "C0002";
            return "C0003";
        } else if ($musclepartId == "M0003") {
            if ($count < 20) return "C0001";
            else if ($count >= 20 && $count <= 40) return "C0002";
            return "C0003";
        }
        if ($gender == 'M') {
            if ($count < 26) return "C0001";
            else if ($count >= 26 && $count <= 39) return "C0002";
            return "C0003";
        }
        if ($count < 16) return "C0001";
        else if ($count >= 16 && $count <= 24) return "C0002";
        return "C0003";
    }

    public function getIntensityId($isAthlete)
    {
        return $isAthlete == "Yes" ? "I0001" : "I0002";
    }

    public function getFrequencyId($bmi)
    {
        if ($bmi < 18.5) return "F0001";
        else if ($bmi >= 18.5 && $bmi < 25) return "F0002";
        else if ($bmi >= 25 && $bmi < 30) return "F0003";
        return "F0004";
    }

    public function getMusclepartId($musclepart)
    {
        if ($musclepart == "Perut") return "M0001";
        else if ($musclepart == "Lengan") return "M0002";
        else if ($musclepart == "Kaki") return "M0003";
        return "M0004";
    }

    // Insert data
    public function insertDiagnosis($data)
    {
        $this->db->transBegin();
        $sql = "INSERT INTO diagnosis (name, age, gender, height, weight, bmi, class, musclepart, intensity, frequency, user_email, tanggal_test) VALUES(:name:, :age:, :gender:, :height:, :weight:, :bmi:, :class:, :musclepart:, :intensity:, :frequency:, :user_email:, :tanggal_test:)";
        $data = [
            'name' => $data['name'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'bmi' => $data['bmi'],
            'class' => $data['class'],
            'musclepart' => $data['musclepart'],
            'intensity' => $data['intensity'],
            'frequency' => $data['frequency'],
            'user_email' => $data['user_email'],
            'tanggal_test' => $data['tanggal_test']
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }
        $this->db->transCommit();
        return TRUE;
    }
}
