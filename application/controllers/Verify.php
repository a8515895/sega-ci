<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {
    private $secret_key="huynhkhoa95";
    function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if(!empty($this->session->userdata("user"))){
            return redirect(base_url("admin/index"));
        }
    }
    function index(){
            $this->load->view("admin/login");
    }
    function login(){
        $pass = hash("sha256",$this->input->post("password").$this->secret_key);
        $login = $this->M_admin->login(["username"=>$this->input->post("username"),"password"=>$pass]);
        if(!empty($login)){
            $this->session->set_userdata("user",$login);
            $this->session->set_flashdata("login","toastr.info('Đăng nhập thành công')");
            return redirect(base_url("admin/home"));
        }
        $this->session->set_flashdata("login","toastr.error('Đăng nhập thất bại')");
        return redirect(base_url("verify/index"));

    }

}
