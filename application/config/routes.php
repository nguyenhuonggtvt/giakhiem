<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//Frontend
//$route['([a-zA-Z0-9_-]+)-cn([0-9]+).html'] = "frontend/test/detailcategotynew/$2";
//$route['([a-zA-Z0-9_-]+)-cp([0-9]+).html'] = "frontend/test/detailcategotyproduct/$2";
//$route['([a-zA-Z0-9_-]+)-n([0-9]+).html'] = "frontend/test/detailnew/$2";
//$route['([a-zA-Z0-9_-]+)-p([0-9]+).html'] ="frontend/test/detailproduct/$2";
$route['lien-he'] ="frontend/c_lienhe";
$route['search'] ="frontend/c_search";
$route['bai-viet/([a-zA-Z0-9_-]+).html$'] ="frontend/c_baiviet/index/$1";
$route['bai-viet'] ="frontend/c_baiviet/listtintuc/";
$route['tu-van-khach-hang'] = "frontend/c_baiviet/listtuvan/";
$route['tin-tuc'] = "frontend/c_baiviet/listtintuc/";
$route['chan-gia/([a-zA-Z0-9_-]+).html$'] ="frontend/c_changia/index/$1";
$route['chan-gia'] ="frontend/c_changia/listchangia/";
$route['tay-gia/([a-zA-Z0-9_-]+).html$'] ="frontend/c_taygia/index/$1";
$route['tay-gia'] ="frontend/c_taygia/listtaygia/";
$route['nep-chinh-hinh/([a-zA-Z0-9_-]+).html$'] ="frontend/c_nepchinhhinh/index/$1";
$route['nep-chinh-hinh'] ="frontend/c_nepchinhhinh/listnepchinhhinh/";
//Admin
$route['default_controller'] = "frontend/home";
$route['trang-chu'] = "frontend/home";

$route['404_override'] = '';
$route['news'] = "admin/c_new";
$route['admin'] = "admin/c_login";
$route['admin/gioithieungan'] = "admin/c_gioithieungan";
$route['pm-new'] = "admin/c_pmnew";
$route['admin/menu'] = "admin/c_menu";
$route['admin/menufooter'] = "admin/c_menuduoi";
$route['groupnew'] = "admin/c_groupnew";
$route['nhomsp'] = "admin/c_groupsp";
$route['admin/lienket'] = "admin/c_lienket";
$route['newsp'] = "admin/c_newsp";
$route['qlsanpham'] = "admin/c_qlsanpham";
$route['dslienhe'] = "admin/c_lienhe";
$route['admin/thongtinlienhe'] = "admin/c_thongtinlienhe";
$route['admin/gioithieungan'] = "admin/c_gioithieungan";
$route['admin/settinghome'] = "admin/c_seohome";
$route['admin/lienhefooter'] = "admin/c_lienhefooter";
$route['admin/slide'] = "admin/c_slide";


/* End of file routes.php */
/* Location: ./application/config/routes.php */