<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>{$title}</title>
    <link rel="icon" type="image/png" href="{$url}/favicon.ico"/>
	<meta name="description" content="{$description}"/>
	<meta http-equiv='content-language' content='vi' />
	<meta property="og:locale" content="vi_VN"/>
	<meta property="og:type" content="{$site_type}"/>
	<meta property="og:title" content="{$title}"/>
	<meta property="og:description" content="{$description}"/>
	<meta property="og:url" content="{current_url()}" />
	<meta property="og:site_name" content="{$site_name}"/>
	<meta property="og:image" content="{if isset($image_header)}{$image_header}{/if}"/>
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:description" content="{$description}" />
	<meta name="twitter:title" content="{$title}" />
	<meta name="twitter:image" content="{if isset($image_header)}{$image_header}{/if}" />
	
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
	
	<!--Insert CSS-->
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/normalize.min.css"/>
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/style.css" media="screen,handheld" />
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/mobile.css" media="screen and (min-width: 18.750em)" />
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/tablet.css" media="screen and (min-width: 34.375em)" />
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/desktop.css" media="screen and (min-width: 48em)" />
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/desktop2.css" media="screen and (min-width: 80em)" />
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/desktop3.css" media="screen and (min-width: 120em)" />
	<!--Nivo Slider-->
	<link href="{$url}webroot/fonts/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/nivo-slider/default/default.css"/>
	<link rel="stylesheet" type="text/css" href="{$url}webroot/frontend/css/nivo-slider/nivo-slider.css"/>

	<script src="{$url}webroot/frontend/js/jquery-1.10.1.min.js"></script>
	<script src="{$url}webroot/frontend/js/jquery-ui.min.js"></script>
	<script src="{$url}webroot/frontend/js/nivo-slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
	<!--End jQuery-->
	
    <script src="{$url}webroot/frontend/js/main.js"></script>
    <script src="{$url}webroot/frontend/js/cart.js"></script>
    <script type="text/javascript" src="{$url}webroot/frontend/js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
	
</head>
<body>
{literal}
	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-66834325-1', 'auto');
  			ga('send', 'pageview');
	</script>
{/literal}
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1469212313374511&autoLogAppEvents=1"></script>
	<div class="topbar">
		<div class="topbar-content">
			<div id="clock">Đang tải...</div>
		</div>
	</div>
	<header id="header">
		<div class="header-content">
			<div class="box-logo">
				<a href="/">
					<img src="{$url}webroot/frontend/img/logo.png" alt="logo-chan-tay-gia-gia-khiem" title="Chân Tay Giả Gia Khiêm"/>
				</a>
				<div class="ten-web">GIA KHIÊM</div>
				<div class="slogan">Vì chất lượng cuộc sống!</div>
			</div>
			<div class="menu">
				<a href="#" class="show-menu">Danh mục</a>
				<ul class="main-menu">
                {foreach $menus as $menu}
                {if $menu.parent==0}
					<li><a href="{$url}{$menu.link}">{$menu.ten_menu}</a>
                        <ul class="sub-menu">
							{foreach $menus as $submenu}
                                {if $submenu.parent==$menu.id}
                                <li><a href="{$url}{$submenu.link}">{$submenu.ten_menu}</a></li>
							    {/if}
                            {/foreach}
						</ul>
                    </li>
                {/if}
                 {/foreach}
				</ul>
				<div class="form-tk">
					<form  action="{$url}search">
						<input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" value="{if isset($keyword)}{$keyword}{/if}"/>
						<input type="submit" value="" id="search" />
					</form>
				</div>
			</div>
		</div>
	</header>
	<!--END HEADER-->
	<div id="main">
    {if isset($trangchu)}
    <div class="slider-wrapper theme-default">
		    <div id="slider" class="nivoSlider">
            {foreach $slides as $slide}
            <a href="{$slide.link_img}"><img src="{$url}webroot/frontend/img_slide/{$slide.name_img}" alt="{$slide.img_alt}" /></a>
            {/foreach}
		    </div>
    </div>
    {/if}
		<!--END SLIDER-WRAPPER-->
		<div id="content"><!--Over-->
			<div class="content-layer2">
				<div class="main-content"><!--Over-->
					<div class="main-content-layer2">