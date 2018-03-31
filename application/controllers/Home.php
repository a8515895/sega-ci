<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_default');
    }
    function index(){
        $data['category'] = $this->M_default->getListCategory([],"category.*",false);
        foreach($data['category'] as $category){
            $data['product'][$category['name']] = $this->M_default->getListProduct(["product.id_category"=>$category['id']],"product.img,product.name,price,product.none_name");
        }
        $this->load->view("default/index",$data);
    }
    function productDetail(){
        if(empty($this->uri->segment(2))) return redirect(base_url('/'));
        $none_name = $this->uri->segment(2);
        $data['product']=$this->M_default->getDetailProduct(["none_name"=>$none_name]);
        return $this->load->view("default/product-detail",$data);
    }
}