<?php
class c_taygia extends CI_Controller{
    public $title           = "Chân tay giả Gia Khiêm";
    public $description     = "Chuyên cung cấp các sản phẩm chân tay giả hàng đầu";
    public $site_type       = "website";
    public $site_name       = "Chân tay giả Gia Khiêm";
    public $status          = 1;
    public $image_header    = '';
    function __construct() {
        parent::__construct();
        $this->load->model('m_chantaygia');
        $this->load->model('m_tintuc');
    }

    function index($id = null) {
        $sanpham = $this->m_chantaygia->get_sanphambySlug($id);
        $group = '';
        if(!empty($sanpham)) {
            $group = $sanpham['ma_nhomsp'];
            $this->title = $sanpham['ten_sp'];
            $this->image_header = base_url().'webroot/imgsp/'.$sanpham['hinhanh_thumb'];
            $this->description = $sanpham['motangan'];
            $this->site_type = 'article';
        } else {
            $this->status=0;
        }

        if(!empty($sanpham)) {
             $nhom = $sanpham['ma_nhomsp'];
             $sp_lienquan = $this->m_chantaygia->listsp_filter('ma_nhomsp',$group,$sanpham['id']);
        } else {
            $nhom = '';
        }   
        
        $temp = [
                    'template' => 'frontend/v_chitietsanpham',
                    'data'     => [
                                    'title'         => $this->title,
                                    'description'   => $this->description,
                                    'site_name'     => $this->site_name,
                                    'site_type'     => $this->site_type, 
                                    'image_header'  => $this->image_header,
                                    'sanphams'      => $sp_lienquan,
                                    'ctsanpham'     => $sanpham,
                                    'status'        => $this->status,
                                ]
                ];
        $this->load->view('common/layout',$temp);
    }

    function listtaygia() {
        $sanphams           = $this->m_chantaygia->get_sanpham(2);
        $gioithieu          = $this->m_tintuc->get_nhomsp(2);
        $this->title        = $gioithieu['tennhom'];
        $this->description  = $gioithieu['mota'];
        $this->image_header = ($gioithieu['hinhanh'] != '') ? base_url() . 'webroot/imgmenu/' . $gioithieu['hinhanh'] : '';
        $this->site_type    ='object';

        $temp = [
                    'template' => 'frontend/v_nhomsp',
                    'data'     => [
                                'title'         => $this->title,
                                'description'   => $this->description,
                                'site_name'     => $this->site_name,
                                'site_type'     => $this->site_type, 
                                'sanphams'      => $sanphams,
                                'baiviet'       => $gioithieu,
                                'status'        => $this->status,
                                'danhmuc'       => 'Tay giả',
                                'image_header'  => $this->image_header
                                ]
                ];

        $this->load->view('common/layout',$temp);
    }
    
}