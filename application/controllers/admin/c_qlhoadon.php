<?php
class c_qlhoadon extends Admin_Controller
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
    }

    function index() {
        //$aryData = $this->m_tintuc->get_sanphamkhac();

        $temp = [
                    'template' => 'admin/v_qlhoadon',
                    'data'     => [
                                    'listsp'    => [],
                                    'status'    => $this->status,
                                    'message'   => $this->message
                                ]
                ];
        
        $this->load->view('bluesky/layout',$temp);
    }
}

