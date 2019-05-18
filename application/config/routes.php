<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
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
$route['lien-he'] ="frontend/c_lienhe";
$route['video'] ="frontend/c_video";
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
$route['san-pham-khac/([a-zA-Z0-9_-]+).html$'] ="frontend/c_sanphamkhac/index/$1";
$route['san-pham-khac'] = "frontend/c_sanphamkhac/listsanphamkhac/";
$route['add-to-cart'] ="frontend/cart/addToCart/";
$route['xem-gio-hang'] ="frontend/cart/showCart/";
$route['send-payment'] ="frontend/cart/sendPayment/";
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
$route['admin/newspkhac'] = "admin/c_qlsanphamkhac/addnewsp";
$route['admin/editspkhac/([a-zA-Z0-9_-]+)'] = "admin/c_qlsanphamkhac/addnewsp/$1";
$route['admin/qlsanphamkhac'] = "admin/c_qlsanphamkhac/listspkhac";
$route['admin/thongtinspkhac'] = "admin/c_qlsanphamkhac/aboutinfo";