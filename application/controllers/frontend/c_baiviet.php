<?php
class c_baiviet extends CI_Controller{
    public $title="Chân tay giả Gia Khiêm";
    public $description="Chuyên cung cấp các sản phẩm chân tay giả hàng đầu";
    public $site_type="website";
    public $site_name="Chân tay giả Gia Khiêm";
    public $status=1;
    public $image_header='';
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_chantaygia');
        $this->load->helper('text');
    }
    function index($id=null){
        $baiviet=$this->m_chantaygia->get_newbySlug($id);
        $group='';
        if(!empty($baiviet))
        {
            $group=$baiviet['ma_nhomtin'];
            $this->image_header=base_url().'webroot/imgnew/'.$baiviet['anhdaidien'];
            $this->title=$baiviet['tieude'];
            $this->description=$baiviet['mota'];
            $this->site_type='article';
        }else{
            $this->status=0;
        }
        
        $tintucs=$this->m_chantaygia->listnew_filter('ma_nhomtin',$group,$baiviet['id']);
        $intro=$this->db->get_where('config',array('id'=>'gioithieu'))->row_array();
        $temp=array
                (
                    'template'=>'frontend/v_chitietbaiviet',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type, 
                                'image_header'=>$this->image_header,
                                'tintucs'=>$tintucs,
                                'baiviet'=>$baiviet,
                                'status'=>$this->status,
                                ) 
                    
                );
        $this->load->view('common/layout',$temp);
    }
    function listtintuc(){
        $tintucs=$this->m_chantaygia->get_baiviet(6);
        $this->title='Tin tức';
        $this->description='Cập nhật tin tức về sức khỏe, các bệnh lý về xương khớp con người';
        $this->site_type='object';
        $temp=array
                (
                    'template'=>'frontend/v_baiviet',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type, 
                                'tintucs'=>$tintucs,
                                'status'=>$this->status,
                                ) 
                    
                );
                $this->load->view('common/layout',$temp); 
    }
     function listtuvan(){
        $tintucs=$this->m_chantaygia->get_baiviet(5);
        //print_r($tintucs);die;
        $this->title='Tư vấn khách hàng';
        $this->description='Chuyên mục giải đáp những câu hỏi thường gặp nhất của khách hàng';
        $this->site_type='object';
        $temp=array
                (
                    'template'=>'frontend/v_baiviet',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type, 
                                'tintucs'=>$tintucs,
                                'status'=>$this->status,
                                ) 
                );
                $this->load->view('common/layout',$temp); 
    }
    
}