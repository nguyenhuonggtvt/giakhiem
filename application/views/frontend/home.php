<h2 class="tieude-cap2">{$gioithieu.tieude}</h2>
<div class="box-gioithieu">
	<div class="box-gioithieu-logo">
		<img src="{$url}webroot/imgnew/{$gioithieu.anhdaidien}"/>
	</div>
	<div class="box-gioithieu-noidung">
		<p>{$gioithieungan}&nbsp;<a href="{$url}bai-viet/{$gioithieu.slug}.html">Đọc thêm</a></p>
	</div>
</div><!--End box giới thiệu-->
<h2 class="tieude-cap2">Danh mục</h2>
{foreach $categories as $category}
<div class="sanpham-item">
	<div class="sanpham-thumb">
		<a href="{$category.link}">
			<img src="{$url}webroot/imgmenu/{$category.img_menu}" alt="" title="" />
		</a>
	</div>
	<div class="sanpham-info">
		<h3><a href="{$category.link}">{$category.ten_menu}</a></h3>
	</div>
</div>
{/foreach}

				