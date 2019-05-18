<?php
class c_thongtinlienhe extends Admin_Controller
{
   
    private $status=10;
    function __construct() {
        parent::__construct();
    }

    function index() {  
        if($this->input->post('save'))
        {   
            $data_hethong=$this->input->post('data');
            $data_hethong['id']='hethong';
            $this->m_tintuc->SaveData_ToTable('hethong',$data_hethong); 
        }
        $temp=array
                (
                    'template'=>'admin/v_thongtinlienhe',
                    'data'    =>array
                                (
                                    'lienhe'    =>$this->db->select('lienhe')->get('hethong')->row_array(),
                                    'status'   =>$this->status
                                ) 
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
}