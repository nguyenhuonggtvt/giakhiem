<?php
 class cart extends Public_Controller {
    public $title           = "Thông tin giỏ hàng - Chân tay giả Gia Khiêm";
    public $description     = "Chuyên cung cấp các sản phẩm chân tay giả và nẹp chỉnh hình";
    public $site_type       = "website";
    public $site_name       = "Chân tay giả Gia Khiêm";
    public $status          = 1;
    public $image_header    = '';
    private $cartTemp = [
        'list'  => [],
        'total' => 0,
        'count' => 0,
    ];

    function __construct() {
        parent::__construct();
        $this->load->helper('text');
    }

    function addToCart() {
        $intOK = 1;
        $msgError = '';

        $aryCart = json_decode($this->session->userdata("cart"), true);
        if(!$aryCart) {
            $aryCart = $this->cartTemp;
        }

        $data = $this->input->post();
        $productData = $this->m_chantaygia->getOtherProductByID($data['productID']);

        if(!empty($productData)) {
            $itemCart = [
                'id'        => $productData['id'],
                'ten_sp'    => $productData['ten_sp'],
                'price'     => $productData['price'],
                'hinhanh'   => $productData['hinhanh'],
                'slug'      => $productData['slug'],
                'quantity'  => 1,
            ];

            if (isset($aryCart['list'][$productData['id']])) {
                $aryCart['list'][$productData['id']]['quantity']++;
            } else {
                $aryCart['list'][$productData['id']] = $itemCart;
            }

            $aryCart['total'] = $aryCart['total'] + $productData['price'];
            $aryCart['count'] = $aryCart['count'] + 1;
            $msg = 'Đã thêm vào giỏ hàng';
        } else {
            $intOK = 0;
            $msg = 'Sản phẩm không tồn tại. Vui lòng kiểm tra lại';
        }

        $this->session->set_userdata('cart', json_encode($aryCart));

        $respon = [
            'intOK' => $intOK,
            'msg'   => $msg,
            'aryCart' => $aryCart
        ];

        echo json_encode($respon);
    }

    function showCart() {
        $aryCart = json_decode($this->session->userdata("cart"), true);
        if(!$aryCart) {
            $aryCart = $this->cartTemp;
        }

        $temp = [
                    'template' => 'frontend/view_cart',
                    'data'     => [
                                    'title'         => $this->title,
                                    'description'   => $this->description,
                                    'site_name'     => $this->site_name,
                                    'site_type'     => $this->site_type, 
                                    'aryCart'       => $aryCart,
                                    'status'        => $this->status,
                                    'image_header'  => $this->image_header,
                            ]
                    
                ];
        $this->load->view('common/layout',$temp);
    }

    function temFunc() {
        // $this->session->unset_userdata('cart');
        $data['text'] = 'Hello';
        $respon['html'] = $this->load->view('frontend/view_cart', $data, true);
        $respon['intOK'] = 1;
        echo json_encode($respon);
    }
}

