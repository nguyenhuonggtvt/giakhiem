<h1 class="tieude-web">{$title}</h1>
<div class="danhmuc-gioithieu">{$description}</div>
<p class="tieude-sub">Sản phẩm</p>
{foreach $sanphams as $sanpham}
<div class="sanpham-item">
	<div class="sanpham-thumb">
		<a href="{$url}{$sanpham.slug_cha}/{$sanpham.slug}.html">
			<img src="{$url}webroot/imgsp/{$sanpham.hinhanh_thumb}"  alt="{$sanpham.slug}" title="{$sanpham.ten_sp}" />
		</a>
	</div>
	<div class="sanpham-info">
		<h2><a href="{$url}san-pham-khac/{$sanpham.slug}.html">{$sanpham.ten_sp}</a></h2>
	</div>
</div>
{/foreach}