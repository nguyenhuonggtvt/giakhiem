<?php
class c_qlsanphamkhac extends MY_Controller
{
    private $btn_val = 'Tạo mới';
    private $status = 10;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
    }

    function listspkhac() {
        if($this->input->get('del')) {
            if($this->m_tintuc->del_sp($this->input->get('del')))
                $this->status = 1;
            else
                $this->status = 0;
        }

        if($this->input->get('hidden')) {
            $update['id']       = $this->input->get('hidden');
            $update['status']   = -1;
            //$this->m_tintuc->SaveData_ToTable('tbl_otherproduct', $update)
        }

        $aryData = $this->m_tintuc->get_sanphamkhac();

        $temp = [
                    'template' => 'admin/v_qlsanphamkhac',
                    'data'     => [
                                    'listsp' => $aryData,
                                    'status' => $this->status
                                ]
                ];
        
        $this->load->view('bluesky/layout',$temp);
    }

    function addnewsp($id) {
        
    }  
}

