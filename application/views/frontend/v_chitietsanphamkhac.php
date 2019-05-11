{if !empty($ctsanpham)}
<div class="chitietsp-thumb">
	<img src="{$url}webroot/imgsp/{$ctsanpham.hinhanh_thumb}" alt="{$ctsanpham.slug}" title="{$ctsanpham.ten_sp}" />
</div>
<div class="chitietsp-info">
	<h1 class="tieude-sanpham-cap1">{$ctsanpham.ten_sp}</h1>
	<div class="chitietsp-share">
		<a href="#" class="btn-share share-facebook"></a>
		<a href="#" class="btn-share share-googleplus"></a>
		<a href="#" class="btn-share share-twitter"></a>
	</div>
	<div class="chitietsp-mota">
		{$ctsanpham.motangan}
	</div>
</div>
<div class="box-chia"></div>
<div class="chitietsp-noidung-chitiet">
	<p><strong>Thông tin chi tiết</strong></p>
	{$ctsanpham.motachitiet}
</div>
{if count($sanphams) > 0}
	<h2 class="tieude-lienquan">Sản phẩm liên quan</h2>
	{foreach $sanphams as $sanpham}
		<div class="sanpham-item">
			<div class="sanpham-thumb">
				<a href="{$url}{$sanpham.slug_cha}/{$sanpham.slug}.html">
					<img src="{$url}webroot/imgsp/{$sanpham.hinhanh_thumb}" alt="" title="" />
				</a>
			</div>
			<div class="sanpham-info">
				<h3><a href="{$url}{$sanpham.slug_cha}/{$sanpham.slug}.html">{$sanpham.ten_sp}</a></h3>
			</div>
		</div>
	{/foreach}
{/if}
{else}
Không tìm thấy sản phẩm
{/if}

