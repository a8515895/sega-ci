<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if(empty($this->session->userdata("user"))){
            return redirect("verify/index");
        }
    }
    function index(){
        $this->load->view("admin/home");
    }
    function home(){
        $this->load->view("admin/home");
    }
    // DASHBOARD
        function dashboard(){
            $this->load->view("admin/dashboard");
        }
    // CATEGORY
        function category(){
            $this->load->view("admin/category");
        }
    // PRODUCT
        function product(){
            $this->load->view("admin/product");
        }
    // BILL
        function bill(){
            $this->load->view("admin/bill");
        }
    // USER
        function user(){
            $this->load->view("admin/user");
        }        
}
