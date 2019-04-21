<?php
class c_login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
       
    }
    function index()
    {    
        
        if($this->session->userdata('taikhoan')!='')
        {
             header('location:'.base_url().'news');   
        }
       
        $thongbao=0;
        if ($this->input->post('login'))
        {
            $taikhoan=trim($this->input->post('username',true));
            $matkhau=trim($this->input->post('password',true));
            $count=$this->db->get_where('user',array('taikhoan'=>$taikhoan,'matkhau'=>sha1($matkhau)))->row_array();    
            
            if(!empty($count))
            {
                $this->session->set_userdata('taikhoan',$count['taikhoan']);
               
                header('location:'.base_url().'newsp');    
            }
            else
            {
                $thongbao=1;
            }
            
                
                
                
        }
        $data['thongbao']=$thongbao;
        $this->parser->parse('admin/v_login',$data);
    }
}