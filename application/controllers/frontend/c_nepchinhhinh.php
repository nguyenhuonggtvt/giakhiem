<?php
class c_nepchinhhinh extends Public_Controller {
    public $title           = "Nẹp chỉnh hình Gia Khiêm";
    public $description     = "Chuyên cung cấp các sản phẩm nẹp chỉnh hình";
    public $site_type       = "website";
    public $site_name       = "Chân tay giả Gia Khiêm";
    public $status          = 1;
    public $image_header    = '';
    function __construct() {
        parent::__construct();
    }
    
    function index($id = null) {
        $sanpham=$this->m_chantaygia->get_sanphambySlug($id);
        
        $group='';
        if(!empty($sanpham)) {
            $group = $sanpham['ma_nhomsp'];
            $this->title = $sanpham['ten_sp'];
            $this->image_header = base_url().'webroot/imgsp/'.$sanpham['hinhanh_thumb'];
            $this->description = $sanpham['motangan'];
            $this->site_type = 'article';
        } else {
            $this->status = 0;
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
                                    'title'=>$this->title,
                                    'description'=>$this->description,
                                    'site_name'=>$this->site_name,
                                    'site_type'=>$this->site_type, 
                                    'image_header'=>$this->image_header,
                                    'sanphams'=>$sp_lienquan,
                                    'ctsanpham'=>$sanpham,
                                    'status'=>$this->status,
                                ]
                ];

        $this->load->view('common/layout',$temp);
    }

    function listnepchinhhinh() {
        $sanphams           = $this->m_chantaygia->get_sanpham(3);
        $gioithieu          = $this->m_tintuc->get_nhomsp(3);
        $this->title        = $gioithieu['tennhom'];
        $this->description  = $gioithieu['mota'];
        $this->image_header = ($gioithieu['hinhanh'] != '') ? base_url() . 'webroot/imgmenu/' . $gioithieu['hinhanh'] : '';
        $this->site_type    = 'object';
        $temp = [
                    'template' => 'frontend/v_nhomsp',
                    'data'     => [
                                    'title'         => $this->title,
                                    'description'   => $this->description,
                                    'site_name'     => $this->site_name,
                                    'site_type'     => $this->site_type,
                                    'sanphams'      => $sanphams,
                                    'status'        => $this->status,
                                    'baiviet'       => $gioithieu,
                                    'image_header'  => $this->image_header,
                                ]
                ];

        $this->load->view('common/layout',$temp);
    }
}