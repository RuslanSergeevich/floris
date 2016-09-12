$(document).ready(function(){

	if (device.mobile() == true) {
		$('body').attr('id', 'mobile');
	}

	$('select').selecter();

	$('.product-card .img ul').bxSlider({
		pager: true,
		nextText: '',
		prevText: ''
	});

	$('.product-selecter ul').bxSlider({
		pager: false,
		nextText: '',
		prevText: ''
	});

	$('.filter-weight').slider({
		min: 0,
		max: 350,
		step: 175,
		value: 175,
		range: 'min'
	});

	$(window).on('scroll', function(){
		var scrollTop = $(this).scrollTop();

		if (scrollTop >= 350) {
			$('a.go-top').fadeIn();
		} else {
			$('a.go-top').fadeOut();
		}
	});

	$('a.go-top').on('click', function() {
		$('html, body').animate({
			scrollTop: 0
		}, 800);
	});
});