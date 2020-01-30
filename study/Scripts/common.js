$(document).ready(function(){
    var hideBtn = $('#hideBtn');
	var main = $('#main');
	var mask = $('.main-middle-mask');
	//菜单隐藏显示
	hideBtn.on('click', function() {
		if(!main.hasClass('hide-side')) {
			main.addClass('hide-side');
		} else {
			main.removeClass('hide-side');
		}
	});
	
	
	//点击隐藏遮罩
	mask.on('click', function() {
		main.removeClass('hide-side');
	});
	
	$(".sub0").click(function(e){
		e.preventDefault();
		$("#skip").attr("src",$(this).attr("href"));
		
	});//列表跳转
	//alert($(window).width());
//	if($(window).width() < 768){
//
//		main.addClass('hide-side');
//		
//		
//	};
    	
    	
    });
