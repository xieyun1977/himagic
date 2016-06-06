
$(function(){

//我的魔咪下拉
$("header .topnav > ul > li").hover(function(){
    $(this).find('.topsub').stop().slideToggle("1s");
})

 //超出显示省略号
$('#inside-pages .pages-refer ul li .retext .teright p').each(function(){
        var maxwidth=90;
        if($(this).text().length>maxwidth){
        $(this).text($(this).text().substring(0,maxwidth));
        $(this).html($(this).html()+'...');
        }
}); 
 //魔幻影音超出显示省略号
$('.newsrig ul li a .newtext p').each(function(){
        var maxwidth=50;
        if($(this).text().length>maxwidth){
        $(this).text($(this).text().substring(0,maxwidth));
        $(this).html($(this).html()+'...');
        }
}); 
});




//图片自动或者左右切换
window.onload = function () {
	var oBtnLeft = document.getElementById("goleft");
	var oBtnRight = document.getElementById("goright");
	var oDiv = document.getElementById("indexmaindiv");
	var oDiv1 = document.getElementById("maindiv1");
	var oUl = oDiv.getElementsByTagName("ul")[0];
	var aLi = oUl.getElementsByTagName("li");
	var now = -5 * (aLi[0].offsetWidth + 16);
	oUl.style.width = aLi.length * (aLi[0].offsetWidth + 16) + 'px';
	oBtnRight.onclick = function () {
		var n = Math.floor((aLi.length * (aLi[0].offsetWidth + 16) + oUl.offsetLeft) / aLi[0].offsetWidth);

		if (n <= 5) {
			move(oUl, 'left', 0);
		}
		else {
			move(oUl, 'left', oUl.offsetLeft + now);
		}
	}
	oBtnLeft.onclick = function () {
		var now1 = -Math.floor((aLi.length / 5)) * 5 * (aLi[0].offsetWidth + 13);

		if (oUl.offsetLeft >= 0) {
			move(oUl, 'left', now1);
		}
		else {
			move(oUl, 'left', oUl.offsetLeft - now);
		}
	}
	var timer = setInterval(oBtnRight.onclick, 6000);
	oDiv.onmouseover = function () {
		clearInterval(timer);
	}
	oDiv.onmouseout = function () {
		timer = setInterval(oBtnRight.onclick, 6000);
	}

};

function getStyle(obj, name) {
	if (obj.currentStyle) {
		return obj.currentStyle[name];
	}
	else {
		return getComputedStyle(obj, false)[name];
	}
}

function move(obj, attr, iTarget) {
	clearInterval(obj.timer)
	obj.timer = setInterval(function () {
		var cur = 0;
		if (attr == 'opacity') {
			cur = Math.round(parseFloat(getStyle(obj, attr)) * 100);
		}
		else {
			cur = parseInt(getStyle(obj, attr));
		}
		var speed = (iTarget - cur) / 6;
		speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
		if (iTarget == cur) {
			clearInterval(obj.timer);
		}
		else if (attr == 'opacity') {
			obj.style.filter = 'alpha(opacity:' + (cur + speed) + ')';
			obj.style.opacity = (cur + speed) / 100;
		}
		else {
			obj.style[attr] = cur + speed + 'px';
		}
	}, 30);
}  


//合作伙伴图片切换
$(document).ready(function() {
	$('#jsCarousel').jsCarousel({ onthumbnailclick: function(src) { 
	// 可在这里加入点击图片之后触发的效果
	$("#overlay_pic").attr('src', src);
	$(".overlay").show();
	}, autoscroll: true });
	
	$(".overlay").click(function(){
		$(this).hide();
	});
});




//文化产品里面的cosplay页面图片切换
$(function(){
	$(".uldiv").Xslider({
		unitdisplayed:1,
		numtoMove:1,
		speed:300,
		scrollobjSize:Math.ceil($(".uldiv").find("li").length/1)*407
	})
})
