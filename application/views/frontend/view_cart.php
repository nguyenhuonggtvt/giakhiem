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
		<div>
			<input type="text" name="cust[name]" placeholder="Họ tên">
		</div>
		<div>
			<input type="text" name="cust[phone]" placeholder="Số điện thoại">
		</div>
		<div>
			<input type="text" name="cust[email]" placeholder="Email">
		</div>
		<div class="clearfix">
			<select name="cust[tinh]" id="slTinh" class="sl-address"
				onchange="ObjMain.getAddress('2', this);">
				<option value="" disabled selected>Tỉnh thành phố</option>
				{foreach $aryAdd as $add}
				<option value="{$add['matp']}">{$add['type']} {$add['name']}</option>
				{/foreach}
			</select>
			<select name="cust[huyen]" id="slHuyen" class="sl-address"
				onchange="ObjMain.getAddress('3', this);">>
				<option value="" disabled selected>Quận huyện</option>
			</select>
			<select name="cust[xa]" id="slXa" class="sl-address">
				<option value="" disabled selected>Phường xã</option>
			</select>
		</div>
		<div>
			<input type="text" name="cust[address]" placeholder="Địa chỉ">
		</div>
		<div>
			<input type="button" id="btnSendCart" value="Gửi" onclick="ObjCart.sendPayment();">
		</div>
	</form>
</div>
{else}
	<div style="padding: 0 0.5em;">
		<p class="box-msg msg-danger">
			Không có sản phẩm nào. Click <a href="/san-pham-khac">vào đây</a> để tiếp tục mua hàng.
		</p>
	</div>
{/if}