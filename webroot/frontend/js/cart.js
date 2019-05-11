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
		        	alert(aryData.msg);
		        	ObjCart.isClick = 0;
				}
				catch(err) {
				    alert(ObjCart.error);
				    ObjCart.isClick = 0;
				}
		    }
	    });
	}
};