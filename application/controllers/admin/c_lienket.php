<?php
class c_lienket extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
    }
    function index()
    {   
        if($this->input->post('save'))
        {   
            $data_hethong=$this->input->post('data');
            $data_hethong['id']='hethong';
            $this->m_tintuc->SaveData_ToTable('hethong',$data_hethong); 
        }
        $temp=array
                (
                    'template'=>'admin/v_lienket',
                    'data'    =>array
                                (
                                    'links'    =>$this->db->select(array('link_facebook','link_google','link_tweeter','link_youtube'))->get('hethong')->row_array(),
                                ) 
                );
        $this->load->view('bluesky/layout',$temp);
    }
}