$(document).ready(function(){
	$('select').selecter({ callback: sortable });

	$('a.fancybox').fancybox({
		helpers: {
			overlay: {
				locked: false
			}
		}
	});

	$('.phone').bind("change keyup input click", function() {
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g, '');
		}
	});

	$('.gallerey-magazine ul').bxSlider({
		pager: false,
		nextText: '',
		prevText: '',
		auto: true
	});

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
		$('header menu').toggleClass('active');
	});

	if ($('.b-list-product li').length > 7) {
		$('.b-list-product ul').bxSlider({
			mode: 'vertical',
			pager: false,
			nextText: '',
			prevText: '',
			auto: false
		});
	}

	$('.b-list-product ul li').on('click', function(){
		var self = $(this),
			product = self.data('product');

		self.addClass('active').siblings('li').removeClass('active');
		$('.choise-product').fadeOut(300);
		setTimeout(function(){
			$('.choise-product.'+product).fadeIn();
		}, 300);
	});

	$('.privat-label ul.slider').bxSlider({
		pager: false,
		nextText: '',
		prevText: '',
		auto: true,
		pause: 6000
	});

	$('footer a.search').on('click', function(){
		$('.b-search').toggleClass('active');
	});

	$('a.play-video').on('click', function(){
		$('#video').addClass('active');
		$('#video-frame').trigger('play');
	});

	$('a.close').on('click', function(){
		$('#video').removeClass('active');
		$('#video-frame').trigger('pause');
	});

	$('a.toggle-view-comments').on('click', function(){
		$('.b-comments').toggleClass('closed');
	});
});