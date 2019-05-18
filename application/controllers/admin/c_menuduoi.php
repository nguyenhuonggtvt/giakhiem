<?php
class c_menuduoi extends Admin_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    private $message='';
    private $khoiphuc=array('id'=>'','ten_menu'=>'','link'=>'');
    function __construct() {
        parent::__construct();
    }

    function index() {       
        if($this->input->post('action')=='stt_up')
        $this->stt_uutien();
        if($this->input->post('save'))
        {
            $data=$this->input->post('data');
            $data['slug']=$this->convertStrToSlug($data['ten_menu']);
            $name_img=$data['slug'];
            if($this->m_tintuc->SaveData_ToTable('menuduoi',$data))
            {
               $this->status=1;
               $this->message="Thành công!";
            }
            else
            {
               $this->status=0;  
               $this->message="Có lỗi sảy ra";
            }
            
            
        }
        if($this->input->get('del')){
            if($this->db->delete('menuduoi',array('id'=>$this->input->get('del'))))
                $this->status=1;
            else
                $this->status=0;
        }
        
        if($this->input->get('edit')){
            $this->khoiphuc=$this->m_tintuc->get_menu_footer($this->input->get('edit'));
            $this->btn_val="Sửa menu";
        }
        
        $temp=array
                (
                    'template'=>'admin/v_menuduoi',
                    'data'    =>array
                                (
                                    'listmenu'    =>$this->m_tintuc->get_menu_footer(),
                                    'status'      =>$this->status,
                                    'btn_val'     =>$this->btn_val,
                                    'khoiphuc'    =>$this->khoiphuc,
                                    'message'     =>$this->message
                                ) 
                    
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
    function stt_uutien(){
        $data['id']=$this->input->post('id');
        $data['stt_uutien']=$this->input->post('stt');
        $this->m_tintuc->SaveData_ToTable('menuduoi',$data);
        echo 1;
        die;
    } 
    }
  
    


