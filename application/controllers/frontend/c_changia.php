<?php
class c_changia extends CI_Controller{
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
            $this->status = 0;
        }
        
        $sp_lienquan=$this->m_chantaygia->listsp_filter('ma_nhomsp',$group,$sanpham['id']);
        
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
                                    'status'=>$this->status
                                ]
                ];

        $this->load->view('common/layout',$temp);
    }

    function listchangia() {
        $sanphams           = $this->m_chantaygia->get_sanpham(1);
        $gioithieu          = $this->m_tintuc->get_nhomsp(1);
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
                                    'image_header'  => $this->image_header,
                                    'sanphams'      => $sanphams,
                                    'status'        => $this->status,
                                    'danhmuc'       => 'Chân giả',
                                    'baiviet'       => $gioithieu,
                                    'image_header'  => $this->image_header
                                ]
                ];

        $this->load->view('common/layout',$temp); 
    }
    
}