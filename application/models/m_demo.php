<?php
/**
 * Created by PhpStorm.
 * User: Thanh Nguyen
 * Date: 7/10/2015
 * Time: 7:25 PM
 */
class m_demo extends MY_Model{
    function login($info){
        $acount=$info['acount'];
        $pass=$info['password'];
        $check=$this->db->
        where(array('acount'=>$acount,
                    'password'=>$pass))
              ->get('user')->result_array();
        return $check;
    }


}

?>