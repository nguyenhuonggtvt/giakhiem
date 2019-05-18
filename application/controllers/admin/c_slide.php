<?php
class c_slide extends Admin_Controller
{
   
    function __construct() {
        parent::__construct();
    }

    function index() {          
       $khoiphuc=array('id'=>'','title_img'=>'','link_href'=>'');
       if($this->input->post('save'))
       {
            $data=$this->input->post('data');
            $data['img_alt']=$this->convertStrToSlug($data['title_img']);
            if($_FILES['anhdaidien']['name']!='')
                $data['name_img']=$data['img_alt'].'.'.end(explode('.',$_FILES['anhdaidien']['name']));
            $res=$this->upload('anhdaidien',$data['name_img'],'./webroot/frontend/img_slide/');
            if($this->m_tintuc->SaveData_ToTable('dm_slide',$data))
            {
                
            }
       }
       if($this->input->get('del')){
        $this->m_tintuc->delSlide($this->input->get('del'));
       }
        $temp=array
                (
                    'template'=>'admin/v_slide',
                    'data'    =>array
                                (
                                    'slides'    =>$this->db->order_by('stt','ASC')->get('dm_slide')->result_array(),
                                    'khoiphuc'=>$khoiphuc
                                ) 
                );
        
        $this->load->view('bluesky/layout',$temp);
    }
    function update_stt(){
        $this->db->update('dm_slide',array('stt'=>$this->input->post('value')),array('id'=>$this->input->post('id')));
    }
    
}
  
    


