<?php
class c_groupsp extends MY_Controller
{
    private $btn_val    = 'Tạo mới';
    private $status     = 10;
    private $message    = '';
    private $khoiphuc   = ['id' => '', 'tennhom' => '', 'mota' => '', 'noidung' => ''];
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tintuc');
    }
    function index()
    {          
        if($this->input->post('save'))
        {
            $data = $this->input->post('data');
            $data['slug'] = $this->convertStrToSlug($data['tennhom']);

            if($_FILES['hinhanh']['name'] != '') {
                $extent = end(explode('.',$_FILES['hinhanh']['name']));
                $extent = strtolower($extent);
                $data['hinhanh'] = $data['slug'] . '-' . date('Ymdhis') . '.' . $extent;
            }

            $intOK = $this->m_tintuc->SaveData_ToTable('dm_nhomsp',$data);

            if($intOK) {
                $this->status = 1;
                // Upload image
                $uploadOK = $this->upload('hinhanh', $data['hinhanh'], './webroot/imgmenu/');
                if($uploadOK) {
                    $this->resizeImg('webroot/imgmenu/'.$data['hinhanh'], 500);
                }

                if($this->input->post('data[id]') != '') {
                    $this->message = "Đã thêm mới";
                } else {
                    $this->message = "Đã cập nhật";
                }
            } else {
               $this->status    = 0;  
               $this->message   = "Có lỗi sảy ra";
            }
        }
        if($this->input->get('del')){
            if($this->db->delete('dm_nhomsp',array('id'=>$this->input->get('del'))))
                $this->status = 1;
            else
                $this->status = 0;
        }
        
        if($this->input->get('edit')){
            $this->khoiphuc = $this->m_tintuc->get_nhomsp($this->input->get('edit'));
            $this->btn_val  = "Cập nhật";
        }
        
        $temp = [
                    'template' => 'admin/v_groupsp',
                    'data'     => [
                                    'listnhom'    => $this->m_tintuc->get_nhomsp(),
                                    'status'      => $this->status,
                                    'btn_val'     => $this->btn_val,
                                    'khoiphuc'    => $this->khoiphuc,
                                    'message'     => $this->message
                                ]
                ];

        $this->load->view('bluesky/layout',$temp);
    }   
}

