(function() {

    /*
     |-----------------------------------------------------------
     |   сбор данных из формы
     |-----------------------------------------------------------
     */

    var data = [];
    $('.form-submit').click(function (e) {
        e.preventDefault();
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
        console.log(data);

        var reklama = $('#reklama').prop('checked');
        var obrazci = $('#obrazci').prop('checked');

        return $.ajax({
            type: 'post',
            url: '/send-order',
            data: {data: data, 'reklama': reklama, 'obrazci': obrazci},
            success: function(data, textStatus, jqXHR) {
                //aaaa
            }
        });
    });

}).call(this);