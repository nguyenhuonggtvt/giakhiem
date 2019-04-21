<?php
class c_groupnew extends MY_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    private $message='';
    private $khoiphuc=array('id'=>'','ten_nhomtin'=>'');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
    }
    function index()
    {          
        if($this->input->post('save'))
        {
            $data=$this->input->post('data');
            $data['slug']=$this->convertStrToSlug($data['ten_nhomtin']);
            if($this->m_tintuc->SaveData_ToTable('dm_nhomtintuc',$data))
            {
               $this->status=1;
               if($this->input->post('data[id]')!='')
                    $this->message="Thêm nhóm bài viết thành công";
               else
                    $this->message="Sửa nhóm bài viết thành công";
               
              
            }
               
            else
            {
               $this->status=0;  
               $this->message="Có lỗi sảy ra";
            }
            
            
        }
        if($this->input->get('del')){
            if($this->db->delete('dm_nhomtintuc',array('id'=>$this->input->get('del'))))
                $this->status=1;
            else
                $this->status=0;
        }
        
        if($this->input->get('edit')){
            $this->khoiphuc=$this->m_tintuc->get_nhomtin($this->input->get('edit'));
            $this->btn_val="Sửa tên nhóm";
        }
        
        $temp=array
                (
                    'template'=>'admin/v_groupnew',
                    'data'    =>array
                                (
                                    'listnhom'    =>$this->m_tintuc->get_nhomtin(),
                                    'status'      =>$this->status,
                                    'btn_val'     =>$this->btn_val,
                                    'khoiphuc'    =>$this->khoiphuc,
                                    'message'     =>$this->message
                                ) 
                    
                );
        $this->load->view('bluesky/layout',$temp);
    }
  
    
}

