<?php
    class m_chantaygia extends CI_Model{
        function __construct(){
            parent::__construct();
            
        }
        function insert(){
            self::SaveData_ToTable();
        }
        function listnew_filter($column,$filter,$skip)
        {
           return $this->db->where(array($column=>$filter))->where_not_in('id',$skip)->get('tbl_tintuc')->result_array();
        }
        function listsp_filter($column,$filter,$skip)
        {
           return $this->db->select(array('tbl_sanpham.*','dm_nhomsp.id as id_dmsp','dm_nhomsp.slug as slug_cha'))->from('tbl_sanpham')->join('dm_nhomsp','tbl_sanpham.ma_nhomsp=dm_nhomsp.id')->where(array($column=>$filter))->where_not_in('tbl_sanpham.id',$skip)->get()->result_array();
        }
        function get_newbySlug($slug)
        {
            return $this->db->get_where('tbl_tintuc',array('slug'=>$slug))->row_array();
        }
        function get_sanphambySlug($slug)
        {
            return $this->db->get_where('tbl_sanpham',array('slug'=>$slug))->row_array();
        }
        function get_baiviet($id){
            return $this->db->get_where('tbl_tintuc',array('ma_nhomtin'=>$id))->result_array();
        } 
        function get_sanpham($id){
            return $this->db->select(array('tbl_sanpham.*','dm_nhomsp.id as id_dmsp','dm_nhomsp.slug as slug_cha'))->from('tbl_sanpham')->join('dm_nhomsp','tbl_sanpham.ma_nhomsp=dm_nhomsp.id')->where(array('ma_nhomsp'=>$id))->get()->result_array();
        }
        function listcategories(){
            return $this->db->query("select * from menu where status=2")->result_array();
        }
        function searchByKeyword($id){
            $sql_news="select *  from tbl_tintuc WHERE tieude like '%$id%' OR mota like '%$id%' OR noidung like '%$id%'  AND status=1 ORDER BY last_update desc,created desc";
            $sql_sp="select *  from tbl_sanpham WHERE ten_sp like '%$id%' OR motangan like '%$id%' OR motachitiet like '%$id%' AND status=1 ORDER BY last_update desc,created desc";
            $data['news']=$this->db->query($sql_news)->result_array();
            $data['sps']=$this->db->query($sql_sp)->result_array();
            return $data;
        }
        // San pham khac
        function getListOtherProduct() {
           return $this->db->select(array('tbl_otherproduct.*'))->from('tbl_otherproduct')->get()->result_array();
        }

        function getOtherProduct($slug) {
           return $this->db->get_where('tbl_otherproduct',array('slug'=>$slug))->row_array();
        }

        function getOtherProductByID($id) {
           return $this->db->get_where('tbl_otherproduct',array('id'=>$id))->row_array();
        }
    }
?>