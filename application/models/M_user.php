<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_user extends CI_model {
    // fungsi simpan data register
    public function simpan_user($data){
        return $this->db->insert("tbl_users", $data);
}
}
?>