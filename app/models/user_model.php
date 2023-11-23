<?php

class user_model {
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $query = "SELECT * FROM user";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getManagerUsers()
    {
        $query = "SELECT * FROM user WHERE level IN ('supervisor', 'staff')";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Function untuk mengambil data staff
    public function getSupervisorUsers()
    {
        $query = "SELECT * FROM user WHERE level = 'staff' ";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    
    public function tambahDataUser($data) 
    {
        $query = "INSERT INTO user 
                    VALUES
                    ('', :nama, :password, :level, :status)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('level', $data['level']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function auth($nama, $password) {
        $query = "SELECT * FROM user WHERE nama = :nama";
        
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $result = $this->db->single();
    
        if ($result && md5($password) === $result['password']) {

            $_SESSION['level'] = $result['level'];
            return $result;
        } else {
            return false;
        }
    }
    

    public function hapus($id)
    {
        $query ="DELETE FROM user WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);

        $this->db->execute(); 

        return $this->db->rowCount();
    }

    public function ubah($id, $data)
    {
        $query = "UPDATE user SET nama = :nama , level = :level , status = :status WHERE id_user = :id_user ";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

}

