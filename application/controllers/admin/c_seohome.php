<?php
class c_seohome extends Admin_Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {   
        if($this->input->post('save'))
        {   
            $data_hethong['settinghome']=json_encode($this->input->post('data'));
            $data_hethong['id']='hethong';
            $this->m_tintuc->SaveData_ToTable('hethong',$data_hethong); 
        }
        $setting=array();
        $set=$this->db->select('settinghome')->get('hethong')->row_array();
        if($set['settinghome']!=''){
            $setting=json_decode($set['settinghome'],true);
        }
        $temp=array
                (
                    'template'=>'admin/v_seohome',
                    'data'    =>array
                                (
                                    'setting'    =>$setting
                                ) 
                );
        $this->load->view('bluesky/layout',$temp);
    }
}