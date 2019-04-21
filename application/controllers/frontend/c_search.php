<?php
class c_search extends CI_Controller{
    public $title="Chân tay giả Gia Khiêm";
    public $description="Tìm kiếm thông tin bài viết, sản phẩm";
    public $site_type="website";
    public $site_name="Tìm kiếm";
    public $status=1;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_chantaygia');
        $this->load->helper('text');
    }
    function index(){
        $keyword = $this->input->get('keyword');
        $data=$this->m_chantaygia->searchByKeyword($keyword);
        $temp=array
                (
                    'template'=>'frontend/v_search',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type, 
                                'tintucs'=>$data['news'],
                                'sanphams'=>$data['sps'],
                                'keyword' => $keyword,
                                ) 
                );
        $this->load->view('common/layout',$temp);
    }
}