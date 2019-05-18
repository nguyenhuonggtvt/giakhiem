var ObjCart = {
	isClick : 0,
	error : 'Error Warning!',
	base_url : window.location.origin,

	addProductToCart : function (id) {
		if(ObjCart.isClick == 1) {
			return false;
		}
		ObjCart.isClick = 1;

		var data = {
			productID : id,
		};
		$.ajax({
		    url: ObjCart.base_url + "/add-to-cart",
		    async: false,
		    type: "POST",
		    data: data,
		    dataType: "html",
		    success: function(data) {
		    	try { 
				    var aryData = $.parseJSON(data);
				    if(aryData.aryCart.count != 0) {
				    	$('.cart-number').text(aryData.aryCart.count);
				    	$('.button-cart').removeClass('hidden');
				    } else {
				    	$('.cart-number').text(0);
				    	$('.button-cart').addClass('hidden');
				    }
		        	alert(aryData.msg);
		        	ObjCart.isClick = 0;
				}
				catch(err) {
				    alert(ObjCart.error);
				    ObjCart.isClick = 0;
				}
		    }
	    });
	},

	viewCart : function () {
		window.location.href = ObjCart.base_url + "/xem-gio-hang";
	},

	sendPayment : function () {
		if(ObjCart.isClick == 1) {
			return false;
		}
		ObjCart.isClick = 1;
		var ajax = {
			url: ObjCart.base_url + "/send-payment",
			type: "POST",
			data: {},
			dataType: "html",
			success: function(data) {
		    	try {
				    var aryData = $.parseJSON(data);
				    alert(aryData.msg);
		        	ObjCart.isClick = 0;
				}
				catch(err) {
				    alert(ObjCart.error);
				    ObjCart.isClick = 0;
				}
		    }
		};

		$("#form-pay-cart").ajaxSubmit(ajax);
		
	},
};