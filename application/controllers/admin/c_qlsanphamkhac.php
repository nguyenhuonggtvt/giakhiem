<?php
class c_qlsanphamkhac extends MY_Controller
{
    private $btn_val    = 'Thêm mới';
    private $status     = 10;
    private $message    = '';
    private $khoiphuc   = [
                            'id'            => '',
                            'ten_sp'        => '',
                            'price'         => '',
                            'showprice'     => '',
                            'hinhanh'       => '',
                            'motangan'      => '',
                            'motachitiet'   => '',
                        ];
    
    function __construct() {
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

        if($this->input->post('save')) {
            $data = $this->input->post('data');
            $data['slug'] = $this->convertStrToSlug($data['ten_sp']);
            if(isset($data['showprice'])) {
                $data['showprice'] = 1;
            } else {
                $data['showprice'] = 0;
            }
           
            if($_FILES['hinhanh']['name'] != '') {
                $extent = end(explode('.',$_FILES['hinhanh']['name']));
                $extent = strtolower($extent);
                $data['hinhanh'] = $data['slug'] . '.' . $extent;
                $data['hinhanh_thumb'] = $data['slug'] . '_thumb.' . $extent;
            }

            if($this->m_tintuc->SaveData_ToTable('tbl_otherproduct', $data)) {
               $this->status = 1;
                    if($_FILES['hinhanh']['name']!='') {
                        $res = $this->upload('hinhanh', $data['hinhanh'], './webroot/imgsp/');
                        if($res) {
                                $this->thumb_img('webroot/imgsp/'.$data['hinhanh']);
                                $this->water_mark('webroot/imgsp/'.$data['hinhanh']);
                                $this->status = 1;
                        } else {
                            $this->status = 0;
                            $this->message = 'Có lỗi trong quá trình upload ảnh';
                        }
                    }
            } else {
               $this->status = 0;  
            }
        }
        
        if($id != null)
        {
            $this->khoiphuc = $this->m_tintuc->get_sanphamkhac($id);
            $this->btn_val  = 'Cập nhật';
        }
        
        $temp = [
                    'template' => 'admin/v_newspkhac',
                    'data'     => [
                                 'btn_val'      => $this->btn_val,
                                 'status'       => $this->status,
                                 'khoiphuc'     => $this->khoiphuc,
                                 'message'      => $this->message
                                ]
                ];

        $this->load->view('bluesky/layout',$temp);
    }
    
}

