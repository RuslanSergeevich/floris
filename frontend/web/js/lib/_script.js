$(document).ready(function(){
	$('select').selecter({ callback: sortable });

	$('a.fancybox').fancybox({
		helpers: {
			overlay: {
				locked: false
			}
		}
	});

	$('.phone').bind("change keyup input click", function () {
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

	$(window).on('scroll', function () {
		var scrollTop = $(this).scrollTop();

		if (scrollTop >= 350) {
			$('a.go-top').fadeIn();
		} else {
			$('a.go-top').fadeOut();
		}
	});

	$('a.go-top').on('click', function () {
		$('html, body').animate({
			scrollTop: 0
		}, 800);
	});

	$('.mobile-menu').on('click', function () {
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

	$('.b-list-product ul li').on('click', function () {
		var self = $(this),
			product = self.data('product');

		self.addClass('active').siblings('li').removeClass('active');
		$('.choise-product').fadeOut(300);
		setTimeout(function () {
			$('.choise-product.' + product).fadeIn();
		}, 300);
	});

	$('.privat-label ul.slider').bxSlider({
		pager: false,
		nextText: '',
		prevText: '',
		auto: true,
		pause: 6000
	});

	$('footer a.search').on('click', function () {
		$('.b-search').toggleClass('active');
	});

	$('a.play-video').on('click', function () {
		$('#video').addClass('active');
		$('#video-frame').trigger('play');
	});

	$('a.close').on('click', function () {
		$('#video').removeClass('active');
		$('#video-frame').trigger('pause');
	});

	$('a.toggle-view-comments').on('click', function () {
		$('.b-comments').toggleClass('closed');
	});

	$('.product-name').on('mouseenter', function () {
		var $el = $(this);
		var imgUrl = $el.data('img');
		var $product = $el.parents('.product').eq(0);

		if (!$product.hasClass('col-with-img')) {
			$product = $product.prevAll('.col-with-img').eq(0);
		}
		$product.find('.b-img > img').attr('src',imgUrl);
	});

	$('.price-count-inp').each(function () {
		var el = {
			$el: $(this),
			$plus: $(this).children('.plus'),
			$minus: $(this).children('.minus'),
			$input: $(this).children('.count'),
			$sum: $(this).parents('.product').eq(0).find('.col-sum').eq(0),
			$product: $(this).parents('.product').eq(0),
			price: parseInt($(this).parents('.product').eq(0).find('.col-price').eq(0).text())
		};

		el.$input.on('keyup', function() {
			var value = el.$input.val();
			if (value < 0 || isNaN(value) || value == '') {
				el.$input.val(0);
			}
			setCountSum();
		});
		el.$plus.on('click', function() {
			var value = el.$input.val();
			if (value >= 0) {
				el.$input.val(+value+1)
			}
			setCountSum();
		});
		el.$minus.on('click', function() {
			var value = el.$input.val();
			if (value > 0) {
				el.$input.val(+value-1)
			}
			setCountSum();
		});

		function setCountSum() {
			var value = el.$input.val();

			el.$sum.text(el.price * value);
			if (value > 0) {
				el.$product.addClass('active');
			} else {
				el.$product.removeClass('active');
			}
			setAllSum();
			setAllCount();
			collectActiveProducts();
		}
	});

	function setAllSum() {
		var sum = 0;

		$('.product .col-sum').each(function () {
			sum += +$(this).text();
		});
		$('.sum-rub span').text(sum);
	}

	function setAllCount() {
		var count = 0;

		$('.product input.count').each(function () {
			count += +$(this).val();
		});
		$('.count-sum').text(count);
	}

	function collectActiveProducts() {
		var $priceHidden = $('.price-hidden table');

		$priceHidden.empty();
		$('.product.active').each(function () {
			var $cloneProduct = $(this).clone();
			var count = $cloneProduct.find('input.count').val();

			$cloneProduct.find('.col-count').empty().text(count);
			$priceHidden.append($cloneProduct);
		})
	}
});