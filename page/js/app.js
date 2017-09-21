$(function(){

	$('.nav').on('click', 'li', function(){
		$('.nav li.active').removeClass('active');
		$('.nav li').addClass('active');
	})

})