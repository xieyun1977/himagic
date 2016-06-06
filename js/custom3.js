$(function() {
	//我的魔咪下拉
	$("header .topnav > ul > li").hover(function() {
		$(this).find('.topsub').stop().slideToggle("1s");
	})
	$(".pages-boxs .book-left ul li").click(function(){
		$(this).find(".book-samllnav").slideToggle()
	})
	
});

