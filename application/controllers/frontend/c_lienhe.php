<?php
 class c_lienhe extends CI_Controller
{
    public $title="Liên hệ";
    public $description="Liên hệ để hiểu hơn về các sản phẩm chân tay giả";
    public $site_type="article";
    public $site_name="Chân tay giả Gia Khiêm";
    public $status=0;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_chantaygia');
        
    }
    function index()
    {   
        if($this->input->post('send')){
             $data=$this->input->post('data');
             $data['created']=time();
             $this->db->insert('tbl_lienhe',$data);
             $this->status=1;
        }
        $lienhe=$this->db->select('lienhe')->from('hethong')->get()->row_array();
        
        $temp=array
                (
                    'template'=>'frontend/v_lienhe',
                    'data'    =>array
                                (
                                'title'=>$this->title,
                                'description'=>$this->description,
                                'site_name'=>$this->site_name,
                                'site_type'=>$this->site_type,
                                'lienhe'   =>$lienhe['lienhe'],  
                                'status'    =>$this->status,
                                ) 
                    
                );
        $this->load->view('common/layout',$temp);
    }
     public function sendemail($param = array()){
        $config = Array(
            'protocol' => 'smtp',//phuong thuc
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,//cong
            'smtp_user' => $param['from'],//tai khoan gui
            'smtp_pass' => $param['password'],//mk tai khoan gui
            'charset' => 'utf-8',//dinh dang
            'newline' => "\r\n",
            'mailtype' => 'html',
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($param['from'], $param['name']);
        $this->email->to($param['to']);//gui toi 
        $this->email->subject($param['subject']);
        $this->email->message($param['message']);
        $this->email->send();
    }
   
    
}

