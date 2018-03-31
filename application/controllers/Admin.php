<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if(empty($this->session->userdata("user"))){
            return redirect(base_url("verify/index"));
        }
        $this->load->library("my_function");
    }
    function index(){
        $this->load->view("admin/home");
    }
    function home(){
        $this->load->view("admin/home");
    }
    // FUNCTION 
        function uploadImg($name){
            if($_FILES['img']['type'] == "image/png" || $_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg")
            {
                $config['upload_path']          = "./public/img/product";
                $config['allowed_types']        = "*";
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']            = $name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('img'))
                {                
                    $this->session->set_flashdata("err",$this->upload->display_errors());
                    return false;
                }
                else
                {
                    return $this->upload->data();
                }                
            }
            return false;

        }
    // DASHBOARD
        function dashboard(){
            $this->load->view("admin/dashboard");
        }
    // CATEGORY
        function category(){
            $data['title'] = "Danh mục";
            $data['list'] = $this->M_admin->getListCategory([],"category.id,category.name,category.create_at,t1.name as createName,category.update_at,category.update_by,t2.name as updateName");
            $this->load->view("admin/category",$data);
        }
        function insertCategory(){
            $data = array(
                'name' => $this->input->post("name"),
                'none_name' => $this->my_function->xoaDau($this->input->post("name"))."-".strtotime('now'),
                'create_at' => strtotime('now'),
                'create_by' => $this->session->userdata("user")->id,
            );
            $this->M_admin->insert("category",$data);
        }
        function updateCategory(){
            $data = array(
                'name' => $this->input->post('name'),
                'none_name' => $this->my_function->xoaDau($this->input->post("name"))."-".strtotime('now'),
                'update_at' => strtotime('now'),
                'update_by' => $this->session->userdata("user")->id,
            );
            $this->M_admin->update("category",$data,['id'=>$this->input->post('id')]);
        }
        function deleteCategory(){
            return $this->M_admin->delete("category",["id"=>$_GET["id"]]);
        }
    // PRODUCT
        function getDetailProduct(){
            $data['title'] = "sản phẩm";
            $data['listCate'] = $this->M_admin->getListCategory([],"category.*",false);
            $data['product']=$this->M_admin->getDetailProduct(["product.id"=>$_GET['id']]);
            $this->load->view("admin/ajax/ajaxGetProduct",$data);
        }
        function product(){
            $data['title'] = "sản phẩm";
            $data['listCate'] = $this->M_admin->getListCategory([],"category.*",false);
            $data['list'] = $this->M_admin->getListProduct([],"product.id,product.name,product.create_at,t1.name as createName,category.name as cateName,product.update_at,product.update_by,t2.name as updateName,img,price");
            $this->load->view("admin/product",$data);
        }
        function insertProduct(){
            $now = strtotime('now');
            $file=$this->uploadImg($this->my_function->xoaDau($this->input->post("name"))."_".$now);
            if($file != false && !empty($_FILES['img']['name'])){
                $data = array(
                    'name' => $this->input->post("name"),
                    'none_name' => $this->my_function->xoaDau($this->input->post("name"))."-".strtotime('now'),
                    'price' => $this->input->post("price"),
                    'id_category'=>$this->input->post("category"),
                    'img' => $file['file_name'],
                    'create_at' => $now,
                    'create_by' => $this->session->userdata("user")->id,
                );
                $this->M_admin->insert("product",$data);
                echo 1;
                return;
            }
            echo 0;
        }
        function updateProduct(){
            $now = strtotime('now');  
            $arrImg = [];          
            if(!empty($_FILES['img']['name'])){
                $file=$this->uploadImg($this->my_function->xoaDau($this->input->post("name"))."_".$now);
                if($file != false){
                    $arrImg=array('img' => $file['file_name']);
                }else{
                    echo 0;
                    return; 
                }
            }
            $data = array(
                'name' => $this->input->post("name"),
                'none_name' => $this->my_function->xoaDau($this->input->post("name"))."-".strtotime('now'),
                'price' => $this->input->post("price"),
                'id_category'=>$this->input->post("category"),
                'update_at' => $now,
                'update_by' => $this->session->userdata("user")->id,
            );
            $data=array_merge($data,$arrImg);
            $this->M_admin->update("product",$data,["id"=>$this->input->post("id")]);
            echo 1;
            return;
        }
        function deleteProduct(){
            return $this->M_admin->delete("product",["id"=>$_GET["id"]]);
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
