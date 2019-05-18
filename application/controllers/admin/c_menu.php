<?php
class c_menu extends Admin_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    private $message='';
    private $khoiphuc=array('id'=>'','ten_menu'=>'');
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
            
            if($_FILES['img_menu']['name']!='') {
                $data['img_menu']=$name_img.'.'.end(explode('.',$_FILES['img_menu']['name']));
            }         
            if($this->m_tintuc->SaveData_ToTable('menu',$data))
            {
                if($_FILES['img_menu']['name']!=''){
                    $this->upload('img_menu',$data['img_menu'],'./webroot/imgmenu');
                }
               $this->status=1;
               if($this->input->post('data[id]')!='')
               
                    $this->message="Thêm menu thành công";
                    
               else
                
                    $this->message="Sửa menu thành công";
               
            }
               
            else
            {
               $this->status=0;  
               $this->message="Có lỗi sảy ra";
            }
            
            
        }
        if($this->input->get('del')){
            if($this->m_tintuc->del_menu($this->input->get('del')))
                $this->status=1;
            else
                $this->status=0;
        }
        
        if($this->input->get('edit')){
            $this->khoiphuc=$this->m_tintuc->get_menu($this->input->get('edit'));
            $this->btn_val="Sửa menu";
        }
        
        $temp=array
                (
                    'template'=>'admin/v_menu',
                    'data'    =>array
                                (
                                    'listmenu'    =>$this->m_tintuc->get_menu(),
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
        $this->m_tintuc->SaveData_ToTable('menu',$data);
        echo 1;
        die;
    }
 
      
      
    }
  
    


