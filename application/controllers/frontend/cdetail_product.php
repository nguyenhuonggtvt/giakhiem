<?php
    class cdetail_product extends Public_Controller {
        function __construct(){
            parent::__construct();
        }
        function index($id_product=null){
            echo $id_product;
            //$str='Chấn tay giả mang tầm Hàn Quốc';
//            echo $this->convertStrToSlug($str);
//            $patern='/^(ab)*$/';//không có hoặc nhiều ký tự (ab)
//            $patern='/^(ab)+$/';//1 có hoặc nhiều 
//            $patern='/^(ab)?$/';//0 có hoặc 1
//            $patern='/^[a-z0-9A-Z]+$/';//0 có hoặc 1
//            if(preg_match($patern, 'agdfh10A')) 
//                    echo 'Yes';
//            else
//                    echo 'No';
        
    }
    function chitiet($id=null,$id1=null)
    {
        echo $id.'<br/>';
        echo $id1;
    }
}
?>
