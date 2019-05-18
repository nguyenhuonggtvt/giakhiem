<?php
    $isMobile               = $this->agent->is_mobile();
    $controlName            = $this->router->fetch_class();
	$data['url']            = base_url();

    // Tin tuc right sidebar
    $viewNewsSidebar        = false;
    if(!$isMobile && $controlName != 'c_baiviet' && $controlName != 'c_search'){
        $viewNewsSidebar    = true;

        $data['listtintuc'] = $this->db->order_by('created','DESC')->limit(7)
                                ->get_where('tbl_tintuc',array('ma_nhomtin'=>6))
                                ->result_array();
        if(!empty($data['listtintuc'])) {
            $data['tintuchead']=$data['listtintuc'][0];
            unset($data['listtintuc'][0]);
        } else {
            $viewNewsSidebar = false;
        }
    }

    $data['isMobile']        = $isMobile;
    $data['controlName']     = $controlName;
    $data['viewNewsSidebar'] = $viewNewsSidebar;
    $data['aryCart']         = $aryCart;

    // Footer
    $lienhe_footer = [];
    $set = $this->db->select('lienhe_footer')->get('hethong')->row_array();
    if($set['lienhe_footer']!='') {
        $lienhe_footer = json_decode($set['lienhe_footer'], true);
    }
    $data['lienhe_footer'] = $lienhe_footer;
    $data['menufooter'] = $this->db->order_by('stt_uutien')->get('menuduoi')->result_array();
    $data['menus'] = $this->db->order_by('stt_uutien')->group_by('id','parent')->get('menu')->result_array();
	$data['links'] = $this->db->select(array('link_facebook','link_google','link_tweeter','link_youtube'))->get('hethong')->row_array();

    $this->parser->parse('common/top',$data);
    $this->parser->parse($template,$data);
    $this->parser->parse('common/bottom',$data);
?>