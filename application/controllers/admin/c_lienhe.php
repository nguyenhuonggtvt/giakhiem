<?php
class c_lienhe extends Admin_Controller {
   
    function __construct() {
        parent::__construct();
    }

    function index() {
        $temp = array
                (
                    'template'=>'admin/v_lienhe',
                    'data'    =>array
                                (
                                    'lienhes'    =>$this->db->order_by('created','DESC')->get('tbl_lienhe')->result_array(),
                                    
                                ) 
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
}