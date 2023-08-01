<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'email';

    // register
    public function insertDataRegister($email, $password)
    {
        $this->db->transBegin();
        $sql = "INSERT INTO users (email, password) VALUES(:email:, :password:)";
        $data = [
            'email' => $email,
            'password' => $password
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

    // login
    public function verifyLogin($email, $password)
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM users");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        $result = $query->getResultArray();

        foreach ($result as $row) {
            if ($email == $row['email']) {
                if (md5($password) == $row['password']) {
                    return $row;
                }
            }
        }

        return FALSE;
    }

    // get semua data user berdasarkan email 
    public function getUserByEmail($email)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM users WHERE email = :email:";
        $data  = [
            'email' => $email
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
