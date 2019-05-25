<h1 class="tieude-web">Thông tin giỏ hàng</h1>
{if (isset($aryCart['count']) && (int)$aryCart['count'] != 0)}
<div class="list-cart clearfix">
	{foreach $aryCart['list'] as $sanpham}
	<div class="box-item-cart">
		<div class="img-item-cart">
			<img src="{$url}webroot/imgsp/{$sanpham['hinhanh']}"  alt="{$sanpham['slug']}" title="{$sanpham['ten_sp']}" />
		</div>
		<div class="info-item-cart">
			<p class='info-item-cart-name'>{$sanpham['ten_sp']}</p>
			<p class='info-item-cart-price'>Giá: {number_format($sanpham['price'])}</p>
			<p class='info-item-cart-quantity'>Số lượng: {$sanpham['quantity']}</p>
		</div>
	</div>
	{/foreach}
</div>
<div class="pay-cart">
	<form id="form-pay-cart">
		<input type="text" name="cust[name]" placeholder="Họ tên">
		<input type="text" name="cust[phone]" placeholder="Số điện thoại">
		<input type="text" name="cust[email]" placeholder="Email">
		<input type="text" name="cust[address]" placeholder="Địa chỉ">
		<input type="button" id="btnSendCart" value="Gửi" onclick="ObjCart.sendPayment();">
	</form>
</div>
{else}
	<div style="padding: 0 0.5em;">
		<p class="box-msg msg-danger">
			Không có sản phẩm nào. Click <a href="/san-pham-khac">vào đây</a> để tiếp tục mua hàng.
		</p>
	</div>
{/if}