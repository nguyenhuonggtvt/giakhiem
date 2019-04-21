<?php
 class home extends CI_Controller
{
    public $title="Chân tay giả Gia Khiêm";
    public $description="Chuyên cung cấp các sản phẩm chân tay giả hàng đầu";
    public $site_type="website";
    public $site_name="Chân tay giả Gia Khiêm";
    public $img="";
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_chantaygia');
        
    }
    function index()
    {   
        $intro=$this->db->select('gioithieungan')->get('hethong')->row_array();
        $setting=array();
        $set=$this->db->select('settinghome')->get('hethong')->row_array();
        if($set['settinghome']!=''){
            $setting=json_decode($set['settinghome'],true);
            $this->title=$setting['tieude'];
            $this->description=$setting['mota'];
            $this->site_name=$setting['tentrang'];
            $this->img=$setting['hinhanh'];
        }
        $temp=array
                (
                    'template'=>'frontend/home',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type,  
                                'img'       =>$this->img,
                                'image_header' => $this->img,
                                'gioithieungan'=>$intro['gioithieungan'],
                                'gioithieu'=>$this->m_chantaygia->get_newbySlug('gioi-thieu'),
                                'categories'=>$this->m_chantaygia->listcategories(),
                                'trangchu'=>1,
                                ) 
                                
                    
                );
                //print_r($temp['data']['gioithieu']);die;
        $this->load->view('common/layout',$temp);
    }
   
    
}
