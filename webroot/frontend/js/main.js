//Hiệu ứng menu trên phiên bản Mobile
function goTo(obj)
{
	$('html,body').animate({
		scrollTop: $(obj).offset().top	
	}, 1000);
}
//Hiệu ứng đồng hồ
function refrClock()
{
var d=new Date();
var s=d.getSeconds();
var m=d.getMinutes();
var h=d.getHours();
var day=d.getDay();
var date=d.getDate();
var month=d.getMonth();
var year=d.getFullYear();
var days=new Array("Chủ nhật,","Thứ 2,","Thứ 3,","Thứ 4,","Thứ 5,","Thứ 6,","Thứ 7,");
var months=new Array("01","02","03","04","05","06","07","08","09","10","11","12");
var am_pm;
if (date<10) {date="0" + date}
if (s<10) {s="0" + s}
if (m<10) {m="0" + m}
if (h<10) {h="0" + h}
document.getElementById("clock").innerHTML=days[day] + " Ngày " + date + "/" + months[month] + "/" + year + " " + h + ":" + m + ":" + s;
setTimeout("refrClock()",1000);
}


$(document).ready(function()
{
    //Khởi tạo đồng hồ
    refrClock();
	//Hiệu ứng ẩn hiện menu trên mobile
	$('.menu > ul') .hide();
	$('a.show-menu').click(function()
	{
		$('.menu > ul').toggle("blind", 1000);
		return false;
	});
//END READY FUNCTION
});

$(window).load(function()
{
    $('#slider').nivoSlider(
        {
            effect: 'sliceUpDownLeft',
            slices: 15, // For slice animations
			boxCols: 8, // For box animations
			boxRows: 4, // For box animations
			animSpeed: 500, // tốc độ slide
			pauseTime: 3000, // Thời gian hiện của mỗi slide
			startSlide: 0, // Slide hiện lên đầu tiên (0 là slide đầu tiên)
			directionNav: true, // Next & Prev navigation
			controlNav: false, // 1,2,3... navigation
			controlNavThumbs: true, // Hiển thị ảnh nhỏ thay vì nút tròn hoặc số, nhớ cho link ảnh nhỏ vào thẻ data-thumb
			pauseOnHover: true, // Dừng slide khi đưa chuột vào
			manualAdvance: false, // Nếu để True thì slide sẽ ko tự động chạy
			prevText: 'Prev', // Prev directionNav text
			nextText: 'Next', // Next directionNav text
			randomStart: false, // Nếu để true thì sẽ bắt đầu bằng slide bất kỳ
			beforeChange: function(){}, // Làm điều gì đó trước khi chạy mỗi slide
			afterChange: function(){}, // Làm điều gì đó sau khi chạy xong mỗi slide
			slideshowEnd: function(){}, // Làm điều gì đó khi chạy xong slide cuối cùng
			lastSlide: function(){}, // Làm điều gì đó khi chạy slide cuối cùng
			afterLoad: function(){} // Làm điều gì đó trước khi chạy slide
        });
	//END LOAD FUNCTION
});

var ObjMain = {
	error : 'Error Warning!',
	base_url : window.location.origin,

	getAddress : function (type, el) {
		var data = {
			type : type,
			parentID : $(el).val(),
		};
		$.ajax({
		    url: ObjMain.base_url + "/get-list-add",
		    async: false,
		    type: "POST",
		    data: data,
		    dataType: "html",
		    success: function(data) {
		    	try {
				    var aryData = $.parseJSON(data);
				    if(aryData.intOK == 1) {
				    	if(aryData.type == 2){
				    		$('#slHuyen').html(aryData.htmlQh);
				    	}
				    	$('#slXa').html(aryData.htmlXa);
				    	
				    } else {
				    	alert(aryData.msg);
				    }
				}
				catch(err) {
				    alert(ObjMain.error);
				}
		    }
	    });
	},
}