<?php
class c_pmnew extends MY_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
    }
    function index()
    {
        if($this->input->get('del')){
            if($this->m_tintuc->del_new($this->input->get('del')))
                $this->status=1;
            else
                $this->status=0;
        }
        if($this->input->get('hidden')){
            $update['id']=$this->input->get('hidden');
            $update['status']=-1;
            $this->m_tintuc->SaveData_ToTable('tbl_tintuc',$update);            
        }
        $temp=array
                (
                    'template'=>'admin/v_pmnew',
                    'data'    =>array
                                (
                                    'listnew'     =>$this->m_tintuc->get_new(),
                                    'status'      =>$this->status
                                ) 
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
}

