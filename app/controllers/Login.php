<?php

class Login extends Controller {


    public function index()
    {
    
        $this->view('templates/header');
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function login() {
        error_reporting(0);

        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $password = $_POST['password'];
    
            $data = $this->model('user_model')->auth($nama, $password);
    
            if ($data !== false) {
                // Set user data in session
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['level'] = $data['level'];
    
                $this->handleLoginSuccess($data);
            } else {
                $this->handleLoginFailure();
            }
        }
    }
    
    private function handleLoginSuccess($data) {

        

    // Simpan informasi pengguna dalam sesi
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];


        if (isset($_SESSION['level'])) {
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
                case 'staff':
                    header('Location: ' . BASEURL . 'barang');
                    exit();
                default:
                    // Handle unknown or unexpected user levels
                    header('Location: ' . BASEURL . 'error');
                    exit();
            }
        
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('user/tampil_user', $data);
            $this->view('templates/footer');
            exit();
        } else {
            // Redirect if the user level is not set
            header('Location: ' . BASEURL . 'login');
            exit();
        }
        
    }
    
    private function handleLoginFailure() {
        echo '<div class="alert alert-danger text-center" role="alert">Login gagal. Periksa kembali nama dan password yang benar.</div>';
    }
     
    public function logout() {
        session_destroy();
        header('location: ' . BASEURL);
        exit();
    }
    
}
