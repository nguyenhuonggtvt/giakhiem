<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('text');
        if($this->session->userdata('taikhoan')!='') {
           
        } else {
            header('location:'.base_url().'admin/c_login');
        }
    }

    function upload($name_input, $name_img, $path = null) {
       
        //Khai bao bien cau hinh
        $config = array();
        //thuc mục chứa file
        if($path == null) {
            $config['upload_path']   = './webroot/imgweb';
        } else {
            $config['upload_path']   = $path;
        }
        //Định dạng file được phép tải
        $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
        //Dung lượng tối đa
        $config['max_size']      = '5000000';
        //Chiều rộng tối đa
        $config['max_width']     = '5000';
        //Chiều cao tối đa
        $config['max_height']    = '5000';
        $config['overwrite']     = true;
        //load thư viện upload
        $config['file_name'] = $name_img;
        $config["manipulation"]['wm_text'] = 'chantaygiagiakhiem.com';
        $config["manipulation"]['wm_type'] = 'text';
        $this->load->library('upload', $config);
        //thuc hien upload
        if($this->upload->do_upload($name_input)) {
            //chua mang thong tin upload thanh con
            return 1;
            //in cau truc du lieu cua file da upload
        } else {
            //hien thi lỗi nếu có
            $error = $this->upload->display_errors();
            return  0;
        }
    }
     
    function thumb_img($path) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 25;
        $config['height'] = 16;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->watermark();
    }

    function water_mark($path) {
        $config['source_image'] = $path;
        $config['wm_text'] = 'chantaygiagiakhiem.com';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size'] = '14';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'right';
        $config['wm_padding'] = '100';
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $a = $this->image_lib->watermark();    
    }

    function convertStrToSlug($str) {
        $str=preg_replace("/(á|à|ả|ã|ạ|ă|ằ|ắ|ẵ|ặ|â|ầ|ấ|ẩ|ẫ|ậ)/", "a", $str);
        $str=preg_replace("/(ù|ú|ủ|ũ|ụ|ư|ừ|ứ|ử|ữ|ự)/", "u", $str);
        $str=preg_replace("/(è|é|ẻ|ẽ|ẹ|ê|ề|ế|ể|ễ|ệ)/", "e", $str);
        $str=preg_replace("/(ì|í|ỉ|ĩ|ị)/", "i", $str);
        $str=preg_replace("/(ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ)/", "o", $str);
        $str=preg_replace("/(ỳ|ý|ỷ|ỹ|ỵ)/", "y", $str);
        $str=preg_replace("/(Á|À|Ả|Ã|Ạ|Ă|Ằ|Ắ|Ẳ|Ặ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ)/", "A", $str);
        $str=preg_replace("/(Ù|Ú|Ủ|Ũ|Ụ|Ư|Ừ|Ứ|Ử|Ữ|Ự)/", "U", $str);
        $str=preg_replace("/(È|É|Ẻ|Ẽ|Ẹ|Ê|Ề|Ế|Ể|Ễ|Ệ)/", "E", $str);
        $str=preg_replace("/(Ì|Í|Ỉ|Ĩ|Ị)/", "I", $str);
        $str=preg_replace("/(Ò|Ó|Ỏ|Õ|Ọ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ|Ơ|Ờ|Ớ|Ở|Ỡ|Ợ)/", "O", $str);
        $str=preg_replace("/(Y|Ý|Ỷ|Ỹ|Ỵ)/", "Y", $str);
        $str=preg_replace("/(Đ)/", "D", $str);
        $str=preg_replace("/(đ)/", "d", $str);
        $str=preg_replace("/([^a-zA-Z0-9-\s])/", "", $str);//Thay #$%^&*() null

        $str=str_replace(' ', '-', $str);
        $str=strtolower($str);
        return $str;
    }

    function resizeImg($path, $width = 0, $height = 0, $thumb = false) {
        $source = $path;
        $size = getimagesize($source);

        if(!$size || $size[0] <= $width) {
            return true;
        }

        if($width == 0) {
            $r_width = 400;
        } else {
            $r_width = $width;
        }

        if($height == 0) {
            $r_height = ($size[1] * $r_width) / $size[0];
        } else {
            $r_height = $height;
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['create_thumb'] = $thumb;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $r_width;
        $config['height'] = $r_height;
        
        $this->load->library('image_lib');
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
}