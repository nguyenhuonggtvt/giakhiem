<?php
class c_newsp extends Admin_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    private $message='';
    private $khoiphuc=array(
                                'id'            =>'',
                                'ten_sp'        =>'',
                                'hinhanh'       =>'',
                                'motangan'      =>'',
                                'motachitiet'   =>'',
                                'ma_nhomsp'     =>''
                           );
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        
        if($this->input->post('save'))
        {
            $data=$this->input->post('data');
            $data['slug']=$this->convertStrToSlug($data['ten_sp']);
           
            if($_FILES['hinhanh']['name']!='')
            {
               $data['hinhanh']=$data['slug'].'.'.end(explode('.',$_FILES['hinhanh']['name']));
               $data['hinhanh_thumb']=$data['slug'].'_thumb.'.end(explode('.',$_FILES['hinhanh']['name']));
            }
            if($this->m_tintuc->SaveData_ToTable('tbl_sanpham',$data))
            {
               $this->status=1;
                    if($_FILES['hinhanh']['name']!='')
                    {
                        $res=$this->upload('hinhanh',$data['hinhanh'],'./webroot/imgsp/');
                           if($res)
                                {
                                    $this->thumb_img('webroot/imgsp/'.$data['hinhanh']);
                                    $this->water_mark('webroot/imgsp/'.$data['hinhanh']);
                                    $this->status=1;
                                }
                           else
                                {
                                    $this->status=0;
                                    $this->message='Có lỗi trong quá trình upload ảnh';  
                                }    
                    }
               
                   
            }
               
            else
            {
                
               $this->status=0;  
            }
            
            
        }
        if($this->input->post('update'))
        {
            
        }
        if($this->input->get('edit'))
        {
            $this->khoiphuc=$this->m_tintuc->get_sanpham($this->input->get('edit'));
            $this->btn_val='Sửa bài viết';
        }
        
        $temp=array
                (
                    'template'=>'admin/v_newsp',
                    'data'    =>array
                                (
                                 'btn_val'      =>$this->btn_val,
                                 'nhomsps'     =>$this->m_tintuc->get_nhomsp(),
                                 'status'       =>$this->status,
                                 'khoiphuc'     =>$this->khoiphuc,
                                 'message'      =>$this->message
                                ) 
                    
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
   
    
}

