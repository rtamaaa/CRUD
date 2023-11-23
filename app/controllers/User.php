<?php

class User extends Controller {
    public function index() {

        switch ($_SESSION['level']) {
            case 'admin':
                $data['usr'] = $this->model('user_model')->getAll();
                break;
            case 'manager':
                $data['usr'] = $this->model('user_model')->getManagerUsers();
                break;
            case 'supervisor':
                $data['usr'] = $this->model('user_model')->getSupervisorUsers();
                break;
                default:
                header('Location: ' . BASEURL . 'Login');
                
                exit();
            }

            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('user/tampil_user', $data);
            $this->view('templates/footer');
            exit();
    }

    public function tambah(){
        if($this->model('user_model')->tambahDataUser($_POST) >0) {
            header('location: '. BASEURL . 'User');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('user_model')->hapus($id) >0) {
            header('location: '. BASEURL . 'User');
            exit;
        }
    } 

    public function ubah($id)
    {
        if (isset($_SESSION['level'])) {
            $data['usr'] = $this->model('User_model')->auth($_SESSION['level']);
            $data['usr'] = $this->model('User_model')->ubah($id);
            $this->view('templates/header', $data);
            $this->view('user', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL);
            exit;
        }

    
    }
}