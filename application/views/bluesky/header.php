<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
     <link rel="icon" type="image/png" href="{$url}/setting.ico"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chân tay giả Gia Khiêm </title>
    <script>
        var gb_url='{$url}';
    </script>
    <!-- Bootstrap core CSS -->

    <link href="{$url}webroot/css/bootstrap.min.css" rel="stylesheet">

    <link href="{$url}webroot/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$url}webroot/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{$url}webroot/css/custom.css" rel="stylesheet">
    <link href="{$url}webroot/css/icheck/flat/green.css" rel="stylesheet">
    <link href="{$url}webroot/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="{$url}webroot/js/jquery.min.js"></script>
    <script src="{$url}webroot/js/notify/pnotify.core.js"></script>
    <script src="{$url}webroot/js/notify/pnotify.buttons.js"></script>
    <script src="{$url}webroot/js/notify/pnotify.nonblock.js"></script>
    <script>
    function showNotify($title,$info,$type,$icon){
        new PNotify({
        title: $title,
        text: $info,
        type: $type,
        icon: $icon
       });
    }
    function NotifySuccess($info){
        new PNotify({
        title: 'Thành công!',
        text: $info,
        type: 'success',
        icon: 'fa fa-check',
        delay:2000
       });
    }
    function NotifyFalse($info){
        new PNotify({
        title: 'Thất bại',
        text: $info,
        type: 'danger',
        icon: 'fa fa-hand-o-down',
         delay:2000
       });
    }
</script>
<style>
    input,input:focus{
        border: #8ECAEA 1px solid;
        background: #E6F3FB;
        height: 35px;
        color:#1D1D1D;
        font-size: 16px;
    }
</style>

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" target="_blank" class="site_title"><i class="fa fa-paw"></i> <span>Gia Khiêm</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{$url}webroot/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Gia Khiêm</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Admin</h3>
                            <ul class="nav side-menu">
                                <li><a href="{$url}dslienhe"><i class="fa fa-envelope-o"></i>Danh sách gửi liên hệ</a></li> 
                                <li><a><i class="fa fa-newspaper-o"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{$url}groupnew">Nhóm bài viết</a>
                                        </li>
                                        <li><a href="{$url}pm-new">Quản lý bài viết</a>
                                        </li>
                                        <li><a href="{$url}news">Bài biết mới</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-cube"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{$url}nhomsp">Nhóm sản phẩm</a>
                                        </li>
                                        <li><a href="{$url}qlsanpham">Quản lý sản phẩm</a>
                                        </li>
                                        <li><a href="{$url}newsp">Sản phẩm mới</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-wheelchair"></i> Sản phẩm khác<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{$url}admin/thongtinspkhac">Thông tin</a>
                                        </li>
                                        <li><a href="{$url}admin/qlsanphamkhac">Quản lý sản phẩm</a>
                                        </li>
                                        <li><a href="{$url}admin/newspkhac">Sản phẩm mới</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="glyphicon glyphicon-cog"></i> Hệ thống <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li>
                                        <a href="{$url}admin/thongtinlienhe">Thông tin liên hệ</a>
                                        </li>
                                        <li><a href="{$url}admin/lienhefooter">Thông tin doanh nghiệp </a>
                                        </li>
                                        <li><a href="{$url}admin/gioithieungan">Giới thiệu ngắn</a>
                                        </li>
                                        <li><a href="{$url}admin/lienket">Liên kết mạng xã hội</a>
                                        </li>
                                        <li><a href="{$url}admin/settinghome">Cấu hình trang chủ</a>
                                        </li>
                                        <li><a href="{$url}admin/menu">Menu chính</a>
                                        </li>
                                        <li><a href="{$url}admin/menufooter">Menu dưới footer</a>
                                        </li>
                                        <li><a href="{$url}admin/slide">Quản lý Slide</a>
                                        </li>
                                        
                                    </ul>
                                </li>  
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{$url}webroot/images/img.jpg" alt="">Gia Khiêm
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">Đổi mật khẩu</a>
                                    </li>
                                    <li><a href="{$url}admin/cLogout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{$url}webroot/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{$url}webroot/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{$url}webroot/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{$url}webroot/images/img.jpg" alt="Profile Image" />
                                            </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
            <div class="right_col" role="main">
            <div class="">
            <div class="clearfix"></div>

            
                    