<?php
class c_sanphamkhac extends CI_Controller{
    public $title           = "Nẹp chỉnh hình Gia Khiêm";
    public $description     = "Chuyên cung cấp các sản phẩm nẹp chỉnh hình";
    public $site_type       = "website";
    public $site_name       = "Chân tay giả Gia Khiêm";
    public $status          = 1;
    public $image_header    = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_chantaygia');
        $this->load->model('m_tintuc');
    }

    function index($slug = null){
        $sanpham = $this->m_chantaygia->getOtherProduct($slug);
        
        if(!empty($sanpham)) {
            $group              = $sanpham['ma_nhomsp'];
            $this->title        = $sanpham['ten_sp'];
            $this->image_header = base_url() . 'webroot/imgsp/' . $sanpham['hinhanh'];
            $this->description  = $sanpham['motangan'];
            $this->site_type    = 'article';
        } else {
            $this->status = 0;
        }
        
        if(!empty($sanpham)) {
            //$nhom         = $sanpham['ma_nhomsp'];
            //$sp_lienquan  = $this->m_chantaygia->listsp_filter('ma_nhomsp',$group,$sanpham['id']);
        } else {
            //$nhom = '';
        }
        
        $temp = [
                    'template' => 'frontend/v_chitietsanphamkhac',
                    'data'     => [
                                'title'         => $this->title,
                                'description'   => $this->description,
                                'site_name'     => $this->site_name,
                                'site_type'     => $this->site_type, 
                                'image_header'  => $this->image_header,
                                'sanphams'      => [],
                                'ctsanpham'     => $sanpham,
                                'status'        => $this->status,
                                ]
                ];

        $this->load->view('common/layout',$temp);
    }

    function listsanphamkhac(){
        $sanphams           = $this->m_chantaygia->getListOtherProduct();
        $gioithieu          = $this->m_tintuc->get_nhomsp(3);
        $this->title        = 'Các sản phẩm hỗ trợ khác';
        $this->description  = $gioithieu['mota'];
        $this->site_type    = 'object';
        $temp = [
                    'template' => 'frontend/v_sanphamkhac',
                    'data'     => [
                                    'title'         => $this->title,
                                    'description'   => $this->description,
                                    'site_name'     => $this->site_name,
                                    'site_type'     => $this->site_type, 
                                    'sanphams'      => $sanphams,
                                    'status'        => $this->status,
                                    'baiviet'       => $gioithieu
                            ]
                    
                ];
        $this->load->view('common/layout',$temp); 
    }
}