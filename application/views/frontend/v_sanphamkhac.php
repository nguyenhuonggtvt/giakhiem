<h1 class="tieude-web">{$title}</h1>
<div class="danhmuc-gioithieu">{$description}</div>

{foreach $sanphams as $sanpham}
<div class="sanpham-item" id="list-other-product">
	<div class="sanpham-thumb">
		<a href="{$url}{$sanpham.slug_cha}/{$sanpham.slug}.html">
			<img src="{$url}webroot/imgsp/{$sanpham.hinhanh_thumb}"  alt="{$sanpham.slug}" title="{$sanpham.ten_sp}" />
		</a>
	</div>
	<div class="sanpham-info">
		<h2><a href="{$url}san-pham-khac/{$sanpham.slug}.html">{$sanpham.ten_sp}</a></h2>
		<div>{number_format($sanpham.price)}</div>
		<div>
			{if $isMobile}
				{word_limiter($sanpham.motangan, 23)}
			{else}
				{word_limiter($sanpham.motangan, 40)}
			{/if}
		</div>
		<span class="btn-add-cart" onclick="ObjCart.addProductToCart('{$sanpham.id}');"><i class="fa fa-shopping-cart"></i> Giỏ hàng</span>
	</div>
</div>
{/foreach}