$(document).ready(function () {
    /*
     |-----------------------------------------------------------
     |   сбор данных из формы
     |-----------------------------------------------------------
     */

    $("#price_form button[type=submit]").click(function (e) {
        e.preventDefault();
        var data  = [],
            _form = $(this).closest('#price_form');
        $('table tr.product').each(function (i) {
            var _this= $(this);
            if(_this.find('.price-count-inp input').val() > 0){
                data[i] = {};
                data[i].name      = _this.find('.col-name div').text().trim();
                data[i].weight    = _this.find('.col-massa').text().trim();
                data[i].count_box = _this.find('.col-up').text().trim();
                data[i].count     = _this.find('.price-count-inp input').val();
                data[i].price     = _this.find('.col-price').text().trim();
                data[i].sum       = _this.find('.col-sum').text().trim();
            }
        });

        data = data.filter(function(x) {
            return x !== undefined;
        });
        if(!data)
            return false;

        var reklama  = $('#reklama').prop('checked'),
            obrazci  = $('#obrazci').prop('checked'),
            name     = _form.find('#name').val(),
            email    = _form.find('#email').val(),
            email_to = _form.find('#email_to').val(),
            itogo    = parseInt($('.itogo .sum-rub span').text().trim());
        if(name){
            return $.ajax({
                type: 'post',
                url: _form.attr('action'),
                data: {data: data, 'reklama': reklama, 'obrazci': obrazci, 'name': name, 'email': email, 'itogo': itogo, 'email_to': email_to},
                success: function(data, textStatus, jqXHR) {
                    document.location.href = '/order-ok';
                }
            });
        }
    });
});