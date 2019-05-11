<?php
 class cart extends CI_Controller {
    private $cartTemp = [
        'list'  => [],
        'total' => 0
    ];

    function __construct() {
        parent::__construct();
        $this->load->model('m_chantaygia');
        $this->load->library('session');
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
            $msg = 'Đã thêm vào giỏ hàng';
        } else {
            $intOK = 0;
            $msg = 'Sản phẩm không tồn tại. Vui lòng kiểm tra lại';
        }

        $this->session->set_userdata('cart', json_encode($aryCart));

        $respon = [
            'intOK' => $intOK,
            'msg'   => $msg,
            'total' => $aryCart['total'],
            'count' => count($aryCart['list']),
            'aryCart' => $aryCart
        ];

        echo json_encode($respon);
    }

    function getTotalPrice($aryData) {

    }

    function temFunc() {
        // $this->session->unset_userdata('cart');
        $data['text'] = 'Hello';
        $respon['html'] = $this->load->view('frontend/view_cart', $data, true);
        $respon['intOK'] = 1;
        echo json_encode($respon);
    }
}

