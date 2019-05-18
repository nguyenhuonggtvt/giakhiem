<h1 class="tieude-web">Thông tin giỏ hàng</h1>
{if (isset($aryCart['count']) && (int)$aryCart['count'] != 0)}
<div class="list-cart">
	{foreach $aryCart['list'] as $sanpham}
	<div class="box-item-cart">
		<div class="img-item-cart">
			<img src="{$url}webroot/imgsp/{$sanpham['hinhanh']}"  alt="{$sanpham['slug']}" title="{$sanpham['ten_sp']}" />
		</div>
		<div class="info-item-cart">
			<p>Tên: {$sanpham['ten_sp']}</p>
			<p>Số lượng: {$sanpham['quantity']}</p>
		</div>
	</div>
	{/foreach}
</div>
<div class="pay-cart">
	<form id="form-pay-cart">
		<input type="text" name="cust['name']" placeholder="Họ tên">
		<input type="text" name="cust['phone']" placeholder="Số điện thoại">
		<input type="text" name="cust['email']" placeholder="Email">
		<input type="text" name="cust['address']" placeholder="Địa chỉ">
		<input type="button" value="Gửi" onclick="ObjCart.sendPayment();">
	</form>
</div>
{else}
	<p>Không có sản phẩm nào</p>
{/if}