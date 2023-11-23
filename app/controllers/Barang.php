<?php


 class Barang extends Controller {


    public function index(){
        $data['brg'] = $this->model('barang_model')->getAll();

        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('barang/tampil_barang', $data);
        $this->view('templates/footer');
        
        
    }

}