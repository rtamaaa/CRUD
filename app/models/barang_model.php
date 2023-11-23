<?php

class Barang_model
{
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $query = "SELECT * FROM barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}