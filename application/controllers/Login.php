<?php 
define('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        // load view form login
        $this->load->view('login');
    }

    public function cek_login() {
        // load model M_user
        $this->load->model('M_user');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // cek login via model
        $cek = $this->m_user->cek_login($username, $password);

        if (!empty($cek)) {

        foreach($cek as $user) {
            // looping data user
            $session_data = array(
                'id_user' => $user->id_user,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap,
            );

            // buat session berdasarkan user yang login
            $this->session->set_userdata($session_data);
        }

        echo "success";

    } else {
        echo "error";
    }
}
}
?>