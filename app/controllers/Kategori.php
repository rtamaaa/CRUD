<?php

class Kategori extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model('Kategori_model');
    }

    public function index() {
        $data['kategori'] = $this->model('kategori_model')->getAll();
        $this->view('barang', $data);
    }
}