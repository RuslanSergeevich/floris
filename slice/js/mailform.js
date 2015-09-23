var clickConstSite = function(id) {
		this.body = $('body');
		this.id = id;
		this.popup = (function(self) {
		return {
			sendValid: function(e) {
				e.preventDefault();          
				var form = $(this),
						valid = true,
						validField =  form.find('.valid').removeClass('error');

				validField.each(function() {
					var eachSelf = $(this);
					if(eachSelf.val() == '' || eachSelf.val() == 'ваше имя' || eachSelf.val() == 'ваш телефон') {
						valid = false;
						eachSelf.addClass('error');
					}
				});            
				if(valid == false) { return false }


				var data = form.serialize();
					data += "&formId=" +form.attr('id');

				// if ($('input.text').val() == '') {
				// 	$(this).find('input.text').addClass('error');
				// } else if ($('input.phone').val() == '') {
				// 	$(this).find('input.phone').addClass('error');
				// } else {
					$.post('mail.php', data, function(responce) {
						if (responce) {
							console.log("Готово new!");
							window.location.href = "/thankyou.html"
							/*$('a#fancybox-close').click();
	              setTimeout(function(){
	              	$('a.thnx').click();
	               },800);           
	              form.find('input.user').val('ваше имя');
	              form.find('input.phone').val('ваш телефон');*/
	            form.find('input[type=text]').val('');
						}
					});
				// }
			}
		}
	})(this);
	this.sendPopup = this.body.on('submit', '#'+this.id, this.popup.sendValid);
}

new clickConstSite('form-header');
new clickConstSite('form-footer');
new clickConstSite('form-one');
new clickConstSite('form-two');
new clickConstSite('form-three');
