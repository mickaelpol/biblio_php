$(function(){

	$('.nav').on('click', 'li', function(){
		$('.nav li.active').removeClass('active');
		$(this).addClass('active');
	})

})