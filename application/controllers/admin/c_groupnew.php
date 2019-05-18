<?php
class c_groupnew extends Admin_Controller
{
    private $btn_val    = 'Tạo mới';
    private $status     = 10;
    private $message    = '';
    private $khoiphuc   = ['id' => '', 'ten_nhomtin' => ''];
    
    function __construct() {
        parent::__construct();
    }

    function index() {          
        if($this->input->post('save'))
        {
            $data=$this->input->post('data');
            $data['slug'] = $this->convertStrToSlug($data['ten_nhomtin']);

            if($_FILES['hinhanh']['name'] != '') {
                $extent = end(explode('.',$_FILES['hinhanh']['name']));
                $extent = strtolower($extent);
                $data['hinhanh'] = $data['slug'] . '-' . date('Ymdhis') . '.' . $extent;
            }

            $intOK = $this->m_tintuc->SaveData_ToTable('dm_nhomtintuc', $data);
            if($intOK) {
                // Upload image
                $uploadOK = $this->upload('hinhanh', $data['hinhanh'], './webroot/imgmenu/');
                if($uploadOK) {
                    $this->resizeImg('webroot/imgmenu/'.$data['hinhanh'], 500);
                }

                $this->status = 1;
                if($this->input->post('data[id]') != '') {
                    $this->message = "Đã thêm";
                } else {
                    $this->message = "Đã cập nhật";
                }
            } else {
               $this->status    = 0;
               $this->message   = "Có lỗi sảy ra";
            }
        }
        if($this->input->get('del')) {
            if($this->db->delete('dm_nhomtintuc',array('id'=>$this->input->get('del'))))
                $this->status = 1;
            else
                $this->status = 0;
        }
        
        if($this->input->get('edit')) {
            $this->khoiphuc = $this->m_tintuc->get_nhomtin($this->input->get('edit'));
            $this->btn_val = "Cập nhật";
        }
        
        $temp = [
                    'template' => 'admin/v_groupnew',
                    'data'     => [
                                    'listnhom'    =>$this->m_tintuc->get_nhomtin(),
                                    'status'      =>$this->status,
                                    'btn_val'     =>$this->btn_val,
                                    'khoiphuc'    =>$this->khoiphuc,
                                    'message'     =>$this->message
                                ]
                ];
        $this->load->view('bluesky/layout',$temp);
    }
}

