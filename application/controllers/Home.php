<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_default');
        $this->load->library('cart');
    }
    function index(){
        $data['category'] = $this->M_default->getListCategory([],"category.*",false);
        foreach($data['category'] as $category){
            $data['product'][$category['name']] = $this->M_default->getListProduct(["product.id_category"=>$category['id']],"product.id,product.img,product.name,price,product.none_name");
        }
        $this->load->view("default/index",$data);
    }
    function productDetail(){
        if(empty($this->uri->segment(2))) return redirect(base_url('/'));
        $none_name = $this->uri->segment(2);
        $data['product']=$this->M_default->getDetailProduct(["none_name"=>$none_name]);
        return $this->load->view("default/product-detail",$data);
    }
    function addCart(){
        $product = $this->M_default->getDetailProduct(["id"=>$this->input->post("id")]);
        if(empty($this->input->post("qty")) || $this->input->post("qty") == 0){
            $qty = 1;
        }else{
            $qty =  $this->input->post("qty");
        }
        $cart = array(
            'id' => $product->id,
            'qty' => empty($this->input->post("qty")) ? 1 : $this->input->post("qty"),
            'price' => $product->price,
            'name' => $product->name,
            'options' => array('img'=>$product->img,'none_name'=>$product->none_name)
        );
        return $this->cart->insert($cart);
    }
    function ajaxCartView(){
        $this->load->view("default/cartAjaxView");
    }
    function cartView(){
        $this->load->view("default/cart");
    }
    function deleteCart(){
        $this->cart->destroy();
        $this->session->set_flashdata("err","toastr.warning('Đã xóa xong giỏ hàng')");
        return redirect(base_url(""));
    }
    function deleteItem(){
        $data = array(
            'rowid' => $_GET['rowid'],
            'qty'   => 0
        );
        $this->session->set_flashdata("err","toastr.warning('Đã xóa xong giỏ hàng')");
        $this->cart->update($data);
        return redirect(base_url("cart"));
    }
    function CountCartItem(){
        echo $this->cart->total_items();
    }
}