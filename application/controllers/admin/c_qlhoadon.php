<?php
class c_qlhoadon extends Admin_Controller
{
    private $status     = 10;
    private $message    = '';
    private $aryStatus  = [
        0 => 'Mới',
        1 => 'Đang xử lý',
        2 => 'Hoàn tất',
        7 => 'Hủy'
    ];
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $aryData = $this->m_tintuc->get_hoadon();

        $temp = [
                    'template' => 'admin/v_qlhoadon',
                    'data'     => [
                                    'aryData'   => $aryData,
                                    'status'    => $this->status,
                                    'message'   => $this->message,
                                    'aryStatus' => $this->aryStatus
                                ]
                ];
        
        $this->load->view('bluesky/layout',$temp);
    }

    function viewhoadon($mahoadon) {
        $aryData = $this->m_tintuc->get_hoadon($mahoadon);
        $aryData['productinfo'] = json_decode($aryData['productinfo'], true);

        $temp = [
                    'template' => 'admin/v_chitiethoadon',
                    'data'     => [
                                    'status'    => $this->status,
                                    'message'   => $this->message,
                                    'aryStatus' => $this->aryStatus,
                                    'aryData'   => $aryData,
                                ]
                ];
        
        $this->load->view('bluesky/layout',$temp);
    }
}

