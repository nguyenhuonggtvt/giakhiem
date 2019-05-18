<?php
class c_lienhefooter extends Admin_Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        if($this->input->post('save'))
        {   
            $data_hethong['lienhe_footer']=json_encode($this->input->post('data'));
            $data_hethong['id']='hethong';
            $this->m_tintuc->SaveData_ToTable('hethong',$data_hethong); 
        }
        $lienhe_footer=array();
        $set=$this->db->select('lienhe_footer')->get('hethong')->row_array();
        if($set['lienhe_footer']!=''){
            $lienhe_footer=json_decode($set['lienhe_footer'],true);
        }
        $temp=array
                (
                    'template'=>'admin/v_lienhefooter',
                    'data'    =>array
                                (
                                    'setting'    =>$lienhe_footer
                                ) 
                );
        $this->load->view('bluesky/layout',$temp);
    }
}