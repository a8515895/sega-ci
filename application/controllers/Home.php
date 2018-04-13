<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    private $secret_key="khoa95";
    function __construct() {
        parent::__construct();
        $this->load->model('M_default');
        $this->load->library('cart');
        $this->load->library('my_function');
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
    function verify(){
        $this->load->view("default/verify");
    }
    function test(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'b8515895@gmail.com', // change it to yours
            'smtp_pass' => '8515895a', // change it to yours
            'smtp_crypto'=>'ssl',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $message = 'TEST EMAIL';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('b8515895@gmail.com'); // change it to yours
        $this->email->to('c8515895@gmail.com');// change it to yours
        $this->email->subject('Resume from JobsBuddy for your Job posting');
        $this->email->message($message);
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
        
        $this->email->send();
    }
    function login(){
        $email=$this->input->post("email");
        $password=hash("sha256",$this->input->post("password").$this->secret_key);
        $user=$this->M_default->login(["email"=>$email,"password"=>$password,"status"=>1]);
        if(!empty($user)){
            $this->session->set_userdata("level",$user->level);
            $this->session->set_userdata("name",$user->name);
            $this->session->set_userdata("email",$user->email);
            $this->session->set_userdata("id",$user->id);
            $this->session->set_flashdata("err","toastr.success('Đăng nhập thành công')");
            echo 0;
            return;
        }else{
            echo json_encode(array(
                "err" => "Email hoặc mật khẩu không chính xác",
            ));
        }
    }
    function register(){
        $email=$this->input->post("email");
        $repassword = $this->input->post("repassword");
        $password=$this->input->post("password");
        if(empty($email) || empty($password) || empty($repassword)){
            echo json_encode(array(
                "err" => "Thông tin không đầy đủ",
            )); 
            return ;
        }
        if($repassword != $password){
            echo json_encode(array(
                "err" => "Re-password khác Password"
            )); 
            return ;
        }else{
            if(!$this->M_default->isEmpty("customer",["email"=>$email])){
                echo json_encode(array(
                    "err" => "Email này đã đăng ký",
                )); 
                return ;
            }
            $password=hash("sha256",$this->input->post("password").$this->secret_key);
            $data = array(
                "email" => $email,
                "password" => $password,
                "level" => 1,
                "create_at" => strtotime('now'),
            );
            $this->M_default->insert("customer",$data);
            return redirect(base_url());
        }
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
        $this->load->view("default/ajax/cartAjaxView");
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
    function info(){
        $id=$this->uri->segment(2);
        $data['user'] = $this->M_default->login(["id"=>$id]);
        $data['province'] = $this->M_default->getListProvince();
        if(!empty($data['user']->province)){
            $data['district'] = $this->M_default->getListDistrict(["provinceid"=>$data['user']->province]);
        }
        if(!empty($data['user']->district)){
            $data['ward'] = $this->M_default->getListWard(["districtid"=>$data['user']->district]);
        }
        $this->load->view("default/info",$data);
    }
    function updateTK(){
        $password=$this->input->post("password");
        $repassword=$this->input->post("repassword");
        $email=$this->input->post("email");
        $id = $this->session->userdata('id');
        if(!empty($password)){
            if($password == $repassword){
                $this->M_default->update("customer",["password"=>hash("sha256",$password.$this->secret_key)],["id"=>$id]);
                echo 0;
                return;
            }else{
                echo json_encode(array(
                    "err"=>"Password và Repassowrd không giống",
                ));
                return;
            }
        }
        if(!empty($email)){
            if(!$this->M_default->isEmpty("customer",["email"=>$email])){
                echo json_encode(array(
                    "err" => "Email này đã đăng ký",
                )); 
                return ;
            }
            $this->session->set_userdata("email",$email);
            $this->M_default->update("customer",["email"=>$email],["id"=>$id]);
            echo 0;
            return;
        }

    }
    function updateInfo(){
        $name=$this->input->post("name");
        $phone=$this->input->post("phone");
        $address=$this->input->post("address");
        $province=$this->input->post("province");
        $ward=$this->input->post("ward");
        $district=$this->input->post("district");
        $id = $this->session->userdata("id");
        $data=array(
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'province' => $province,
            'ward' => $ward,
            'district' => $district,
        );
        $this->M_default->update("customer",$data,["id"=>$id]);
        echo 0;
        return;
    }
    function changeSelectProvince(){
        $id = $_GET['id'];
        echo "<option value=''>Đang cập nhật</option>";
        if($id != ''){
            $district=$this->M_default->getListDistrict(['provinceid'=>$id]);
            foreach($district as $dis){
                echo "<option value='$dis[districtid]'>$dis[name]</option>";
            }
        }
    }
    function changeSelectDistrict(){
        $id = $_GET['id'];
        echo "<option value=''>Đang cập nhật</option>";
        if($id != ''){
            $district=$this->M_default->getListWard(['districtid'=>$id]);
            foreach($district as $dis){
                echo "<option value='$dis[wardid]'>$dis[name]</option>";
            }
        }
    }
    function checkout(){
        $data['province'] = $this->M_default->getListProvince();
        if(!empty($this->session->userdata("email")))
        {
            $data['profile'] = $this->M_default->getProfileCustomer(["email"=>$this->session->userdata("email")]);
            if(!empty($data['profile']->province)){
                $data['district']=$this->M_default->getListDistrict(["provinceid"=>$data['profile']->province]);
            }
            if(!empty($data['profile']->district)){
                $data['ward'] = $this->M_default->getListWard(["districtid"=>$data['profile']->district]);
            }
        } 
        return $this->load->view("default/checkout",$data);
    }
    function confirm_checkout(){
        $name = $this->input->post("name");
        $phone = $this->input->post("phone");
        $address = $this->input->post("address");
        $province = $this->input->post("province");
        $district = $this->input->post("district");
        $ward = $this->input->post("ward");
        $email = $this->input->post("email");
        $note = $this->input->post("note");
        if(!empty($name) && !empty($phone) && !empty($address) && !empty($province) && !empty($district) && !empty($ward)){
            $this->session->set_userdata("checkout",array(
                "name"=>$name,
                "phone"=>$phone,
                "address"=>$address,
                "province"=>$this->M_default->getListProvince(["provinceid"=>$province])[0]['name'],
                "district"=>$this->M_default->getListDistrict(["districtid"=>$district])[0]['name'],
                "ward"=>$this->M_default->getListWard(["wardid"=>$ward])[0]['name'],
                "note"=>$note,
                "email"=>$email
            ));
            echo 0;
            return;
        }else{
            echo json_encode(array(
                "err" => "Không đủ thông tin cần thiết",
            ));
        }
    }
    function checkout_payment(){
        $data['checkout']=$this->session->userdata("checkout");
        return $this->load->view("default/checkout-payment",$data);
    }
    function checkout_success(){
        return $this->load->view("default/checkout-success");
    }
}