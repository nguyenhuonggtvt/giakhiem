<?php
 class c_video extends Public_Controller {
    public $title="Thư viện video";
    public $description="Cùng xem các video thực tế về tác dụng của chân tay giả";
    public $site_type="article";
    public $site_name="Chân tay giả Gia Khiêm";
    public $status=0;
    function __construct() {
        parent::__construct();
    }

    function index() {
        $aryVideo = [
            ['title' => 'Tập đi với chân giả Gia Khiêm', 'code' => '-xQwVazMKtk'],
            ['title' => 'Viết chữ bằng tay giả - Phần 2', 'code' => '4ZVR7oKWRL4'],
            ['title' => 'Sử dụng tay giả trong đời sống thực tế', 'code' => 'j3RWG3L9nkY'],
            ['title' => 'Leo cầu thang với chân giả', 'code' => 'n71Mp-meRxc'],
        ];
        
        $temp=array
                (
                    'template'=>'frontend/v_video',
                    'data'    =>array
                                (
                                'title'         =>$this->title,
                                'description'   =>$this->description,
                                'site_name'     =>$this->site_name,
                                'site_type'     =>$this->site_type,
                                'status'        =>$this->status,
                                'aryVideo'      => $aryVideo,
                                ) 
                    
                );
        $this->load->view('common/layout',$temp);
    }
}

