<?php
class cLogout extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    function index(){
        $this->session->unset_userdata('taikhoan');
        header('location:'.base_url().'admin/c_login');
    }
}