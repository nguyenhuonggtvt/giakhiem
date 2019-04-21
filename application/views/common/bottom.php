	</div><!--End main-content-layer2-->
				</div>
<div class="siderbar">
{if $viewNewsSidebar && !empty($tintuchead)}
<div class="siderbar-box">
	<div class="siderbar-header">Tin tức</div>
	<div class="siderbar-content">
		<div class="list-tintuc-item">
        {if !empty($tintuchead)}
			<div class="list-tintuc-thumb">
				<a href="{$url}bai-viet/{$tintuchead.slug}.html"><img src="{$url}webroot/imgnew/{$tintuchead.anhdaidien}"/></a>
			</div>
			<div class="list-tintuc-link">
				<a href="{$url}bai-viet/{$tintuchead.slug}.html" title="{$tintuchead.tieude}">{$tintuchead.tieude}</a>
			</div>
            
        {/if}
		</div>
        
        {foreach $listtintuc as $tintuc }
		
        <div class="list-tintuc-item">
        
			<div class="list-tintuc-thumb">
				<a href="{$url}bai-viet/{$tintuc.slug}.html"><img src="{$url}webroot/imgnew/{$tintuc.anhdaidien}"></a>
			</div>
			<div class="list-tintuc-link">
				<a href="{$url}bai-viet/{$tintuc.slug}.html" title="{$tintuc.tieude}">{$tintuc.tieude}</a>
			</div>
		</div>
        {/foreach}
		
		<a href="{$url}tin-tuc" class="btn-xemthem">Xem thêm</a>
	</div>
</div>
{/if}
<!--END TIN TỨC-->
<div class="siderbar-box" id="box-video">
	<div class="siderbar-header">Video</div>
	<div class="siderbar-content">
		<div class="video-container">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/-xQwVazMKtk?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="video-container">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/4ZVR7oKWRL4?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="video-container">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/j3RWG3L9nkY?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="video-container">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/n71Mp-meRxc?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<!--END VIDEO-->

</div>
<!--END SIDERBAR-->
</div>
</div>
	<!--END CONTENT-->
</div>
<!--END MAIN-->
<footer id="footer">
	<div class="footer-content">
		<div class="menu-bottom">
			<ul>
            {foreach $menufooter as $value}
				<li><a href="{$value.link}">{$value.ten_menu}</a></li>
            {/foreach}
			</ul>
		</div>
		<!--End menu-->
		<div class="footer-box footer-info">
			<h4>Liên hệ với chúng tôi</h4>
			<p class="tencty">{$lienhe_footer.doanhnghiep}</p>
			<p>Địa chỉ: {$lienhe_footer.diachi}</p>
			<p>Hotline: {$lienhe_footer.hotline}</p>
			<p>Fax: {$lienhe_footer.telfax}</p>
			<p>Website: <a href="/">{$lienhe_footer.website}</a></p>
		</div>
		<div class="footer-box footer-social">
			<h4>Liên kết</h4>
			<div class="social-icon">
				<a class="btn-social btnfacebook" href="{$links.link_facebook}" target="_blank"></a>
				<a class="btn-social btntwitter" href="{$links.link_tweeter}" target="_blank"></a>
				<a class="btn-social btnyoutube" href="{$links.link_youtube}" target="_blank"></a>
			</div>
			<!-- <div class="dang-ky-cong-thuong">
				<img src="{$url}webroot/frontend/img/bo-cong-thuong.png"/>
			</div> -->
		</div>
	</div>
</footer>
<div class="under-footer">Copyright © 2010 Chân tay giả & nẹp chỉnh hình Gia Khiêm. All Rights Reserved.</div>
<!--END FOOTER-->
</body>
</html>