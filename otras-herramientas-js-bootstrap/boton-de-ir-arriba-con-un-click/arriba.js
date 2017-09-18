$(document).on("ready",function(){
	$(".ir-arriba").click(function(){
		$("body, html").animate({
			scrollTop: "0px"
		},600);
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > 0){
			$(".ir-arriba").slideDown(600);
		}else{
			$(".ir-arriba").slideUp(600);
		}
	});
});