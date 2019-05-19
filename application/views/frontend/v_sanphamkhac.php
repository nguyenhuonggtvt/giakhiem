<h1 class="tieude-web">{$title}</h1>
<div class="danhmuc-gioithieu">{$description}</div>

{foreach $sanphams as $sanpham}
<div class="sanpham-item" id="list-other-product">
	<div class="sanpham-thumb">
		<a href="{$url}san-pham-khac/{$sanpham.slug}.html">
			<img src="{$url}webroot/imgsp/{$sanpham.hinhanh_thumb}"  alt="{$sanpham.slug}" title="{$sanpham.ten_sp}" />
		</a>
	</div>
	<div class="sanpham-info">
		<h2><a href="{$url}san-pham-khac/{$sanpham.slug}.html">{$sanpham.ten_sp}</a></h2>
		<div class="sanpham-price">{number_format($sanpham.price)}</div>
		<div class="sanpham-short-des">
			{if $isMobile}
				{word_limiter($sanpham.motangan, 23)}
			{else}
				{word_limiter($sanpham.motangan, 40)}
			{/if}
		</div>
		<div class="box-btn-add-cart">
			<span class="btn-add-cart" onclick="ObjCart.addProductToCart('{$sanpham.id}');">
				<i class="fa fa-shopping-cart"></i> Giỏ hàng
			</span>
		</div>
	</div>
</div>
{/foreach}