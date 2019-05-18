<?php
class c_new extends Admin_Controller
{
    private $btn_val='Tạo mới';
    private $status=10;
    private $message='';
    private $khoiphuc=array(
                                'id'        =>'',
                                'tieude'    =>'',
                                'anhdaidien'=>'',
                                'ma_nhomtin'=>'',
                                'mota'      =>'',
                                'noidung'   =>''
                           );
    
    function __construct() {
        parent::__construct();
    }

    function index() {           
        if($this->input->post('save'))
        {
            $data=$this->input->post('data');
            $data['slug']=$this->convertStrToSlug($data['tieude']);
            //print_r($_FILES);die;
            if($_FILES['anhdaidien']['name']!='')
               $data['anhdaidien']=$data['slug'].'.'.end(explode('.',$_FILES['anhdaidien']['name']));
            if($this->m_tintuc->SaveData_ToTable('tbl_tintuc',$data))
            {
               $this->status=1;
               if($this->input->post('data[id]')!='')
                    $this->message="Thêm bài viết thành công";
               else
                    $this->message="Sửa bài viết thành công";
               
               if($_FILES['anhdaidien']['name']!='')
               {
                    $res=$this->upload('anhdaidien',$data['anhdaidien'],'./webroot/imgnew/');
                    //print_r($res);die;
                       if($res['file_name'])
                            {
                                $this->thumb_img('webroot/imgweb/'.$data['anhdaidien']);
                                $this->water_mark('webroot/imgweb/'.$data['anhdaidien']);
                                $this->status=1;
                            }
                       else
                            {
                               
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
            $this->khoiphuc=$this->m_tintuc->get_new($this->input->get('edit'));
            $this->btn_val='Sửa bài viết';
        }
        $temp=array
                (
                    'template'=>'admin/v_new',
                    'data'    =>array
                                (
                                 'btn_val'      =>$this->btn_val,
                                 'nhomtins'     =>$this->m_tintuc->get_nhomtin(),
                                 'status'       =>$this->status,
                                 'khoiphuc'     =>$this->khoiphuc,
                                 'message'      =>$this->message 
                                ) 
                );
        $this->load->view('bluesky/layout',$temp);
    }
   
    
}

