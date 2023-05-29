<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // cek session login
        if ($this->session->userdata('id_user') != "") {
            redirect('/login');
    }
}

public function index() {
    // load view from login
    $this->load->view('dashboard');
}

public function logout() {
    // hapus session
    $this->session->sees_destroy();

    redirect('/login');
}
}
?>