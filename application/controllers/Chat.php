<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('cart');

    }
    function index(){
        return $this->load->view('chat/index');
    }
}