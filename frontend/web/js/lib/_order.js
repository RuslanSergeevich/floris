$(document).ready(function () {
    /*
     |-----------------------------------------------------------
     |   сбор данных из формы
     |-----------------------------------------------------------
     */

    $("#order form input[type=submit]").click(function (e) {
        e.preventDefault();
        alert('d');
        var data = [];
        $('table tr.product').each(function (i) {
            var _this = $(this);
            if(_this.find('.price-count-inp input').val() > 0){
                data[i] = {};
                data[i].name = _this.find('.col-name div').text().trim();
                data[i].weight = _this.find('td:eq(2)').text().trim();
                data[i].count_box = _this.find('td:eq(3)').text().trim();
                data[i].count = _this.find('.price-count-inp input').val();
                data[i].price = _this.find('.col-price').text().trim();
                data[i].sum = _this.find('.col-sum').text().trim();
            }
        });

        data = data.filter(function(x) {
            return x !== undefined;
        });
        if(!data)
            return false;

        var reklama  = $('#reklama').prop('checked'),
            obrazci  = $('#obrazci').prop('checked'),
            name     = $(this).find('.name').val(),
            email    = $(this).find('.email').val(),
            email_to = $(this).find('.email_to').val(),
            itogo    = parseInt($('.itogo .sum-rub span').text().trim());

        if(name && email){
            return $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: {data: data, 'reklama': reklama, 'obrazci': obrazci, 'name': name, 'email': email, 'itogo': itogo, 'email_to': email_to},
                success: function(data, textStatus, jqXHR) {
                    document.location.href = '/order-ok';
                }
            });
        }
    });
});