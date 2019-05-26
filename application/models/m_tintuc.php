<?php
class m_tintuc extends MY_Model{
    function get_nhomtin($id=null){
        if($id==null)
        return $this->db->get('dm_nhomtintuc')->result_array();
        return $this->db->get_where('dm_nhomtintuc',array('id'=>$id))->row_array();
    }
    function get_new($id=null){
        if ($id==null)
            return $this->db->select('tbl_tintuc.*,ten_nhomtin')->from('tbl_tintuc')->join('dm_nhomtintuc','tbl_tintuc.ma_nhomtin=dm_nhomtintuc.id')->order_by('ma_nhomtin')->order_by('created','DESC')->get()->result_array();
            return $this->db->get_where('tbl_tintuc',array('id'=>$id))->row_array();
    }
    function get_sanpham($id=null){
        if ($id==null)
            return $this->db->select('tbl_sanpham.*,tennhom')->from('tbl_sanpham')->join('dm_nhomsp','tbl_sanpham.ma_nhomsp=dm_nhomsp.id')->order_by('stt_uutien')->order_by('created','DESC')->get()->result_array();
            $a= $this->db->get_where('tbl_sanpham',array('id'=>$id))->row_array();
            return $a;
    }
    function del_sp($id){
        $check=$this->db->get_where('tbl_sanpham',array('id'=>$id))->row_array();
        if(!empty($check)){
            if(file_exists('webroot/imgsp/'.$check['hinhanh']));
            unlink('webroot/imgsp/'.$check['hinhanh']);
            return $this->db->delete('tbl_sanpham',array('id'=>$id));
        }else{
            return $this->db->delete('tbl_sanpham',array('id'=>$id));
        }
        
    }
    function del_menu($id){
        $check=$this->db->get_where('menu',array('id'=>$id))->row_array();
        if(!empty($check)){
            if(file_exists('webroot/imgmenu/'.$check['img_menu']));
            unlink('webroot/imgmenu/'.$check['hinhanh']);
            
        }else{
            return $this->db->delete('tbl_sanpham',array('id'=>$id));
        }
        
    }
    function delSlide($id){
        $check=$this->db->get_where('dm_slide',array('id'=>$id))->row_array();
        //echo $check['name_img'];
        if(!empty($check)){
            if(file_exists('webroot/frontend/img_slide/'.$check['name_img']))
                unlink('webroot/frontend/img_slide/'.$check['name_img']);  
                return $this->db->delete('dm_slide',array('id'=>$id));
               
        }else{
            return $this->db->delete('dm_slide',array('id'=>$id));
        }
    }
    function del_new($id){
        $check=$this->db->get_where('tbl_tintuc',array('id'=>$id))->row_array();
        if(!empty($check)){
            if(file_exists('webroot/imgnew/'.$check['anhdaidien']));
            unlink('webroot/imgnew/'.$check['anhdaidien']);
            return $this->db->delete('tbl_tintuc',array('id'=>$id));
        }else{
            return $this->db->delete('tbl_tintuc',array('id'=>$id));
        }
        
    }
    function get_nhomsp($id = null){
        if($id == null) {
            return $this->db->order_by('last_update','DESC')->order_by('created','DESC')->get('dm_nhomsp')->result_array();
        }
        return $this->db->get_where('dm_nhomsp',array('id'=>$id))->row_array();
    }
    function categories_sp($id=null){
       return $this->db->query("select * from menu where id not in(1,6,7)")->result_array();
    }
    function get_menu($id=null){
        if($id==null)
        return $this->db->order_by('stt_uutien')->get('menu')->result_array();
        return $this->db->get_where('menu',array('id'=>$id))->row_array();
    }
    function get_menu_footer($id=null){
        if($id==null)
        return $this->db->order_by('stt_uutien')->get('menuduoi')->result_array();
        return $this->db->get_where('menuduoi',array('id'=>$id))->row_array();
    }
    // San pham khac
    function get_sanphamkhac($id = null) {
        $arrayData = [];
        if ($id != null) {
            $arrayData = $this->db->get_where('tbl_otherproduct', array('id' => $id))->row_array();
        } else {
            $arrayData = $this->db->select('tbl_otherproduct.*')->from('tbl_otherproduct')->order_by('order')->order_by('created','DESC')->get()->result_array();
        }

        return $arrayData;
    }

    function del_spkhac($id) {
        $check = $this->db->get_where('tbl_otherproduct', ['id'=>$id])->row_array();
        if(!empty($check)) {
            if(file_exists('webroot/imgsp/'.$check['hinhanh']));
                unlink('webroot/imgsp/'.$check['hinhanh']);
            return $this->db->delete('tbl_otherproduct', ['id'=>$id]);
        } else {
            return $this->db->delete('tbl_otherproduct', ['id'=>$id]);
        }
        
    }

    // Hoa don
    function get_hoadon($id = null) {
        $arrayData = [];
        if ($id != null) {
            $arrayData = $this->db->get_where('tbl_hoadon', array('id' => $id))->row_array();
        } else {
            $arrayData = $this->db->select('tbl_hoadon.*')->from('tbl_hoadon')->order_by('ngaymua','DESC')->get()->result_array();
        }

        return $arrayData;
    }
}