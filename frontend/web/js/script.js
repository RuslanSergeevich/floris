$(document).ready(function(){

	// if (device.mobile() == true) {
	// 	$('body').attr('id', 'mobile-view');
	// }

	$('select').selecter();

	$('.product-card .img ul').bxSlider({
		pager: true,
		nextText: '',
		prevText: ''
	});

	$('ul.list-promo').bxSlider({
		pager: true,
		nextText: '',
		prevText: '',
		auto: true,
		pause: 6000
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

	$('.mobile-menu').on('click', function() {
		$('header menu').toggleClass('screen');
	});
});