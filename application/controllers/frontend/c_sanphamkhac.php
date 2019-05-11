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
        $set                = $this->db->select('settingotherproduct')->get('hethong')->row_array();
        if($set['settingotherproduct'] != '') {
            $arySetting     = json_decode($set['settingotherproduct'], true);
        }
        $this->title        = (isset($arySetting['tieude'])) ? $arySetting['tieude'] : $this->title;
        $this->description  = (isset($arySetting['mota'])) ? $arySetting['mota'] : $this->description;
        $this->image_header = (isset($arySetting['hinhanh'])) ? base_url() . 'webroot/imgmenu/' . $arySetting['hinhanh'] : '';
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
                                    'image_header'  => $this->image_header,
                            ]
                    
                ];
        $this->load->view('common/layout',$temp); 
    }
}