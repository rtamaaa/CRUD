<?php



class Kategori_model {

    private $db;

    function __construct()
    {
        $this->db = new Database;
    }
    public function getAll() {
        $query = "SELECT id_kategori, nama_kategori FROM kategori";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}