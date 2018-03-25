<?php
class M_admin extends CI_Model {
    public function login($condition){
        return $this->db->get_where("admin",$condition)->first_row();
    }
}