(function() {

    /*
     |-----------------------------------------------------------
     |   сбор данных из формы
     |-----------------------------------------------------------
     */

    var data = [];
    $('.btn_send').click(function (e) {
        e.preventDefault();
        $('.aplication_form tr.aplication_product').each(function (i) {
            var _this = $(this);
            if(_this.find('.number_input_box input').val() > 0){
                data[i] = {};
                data[i].name = _this.find('.aplication_product_item div').text();
                data[i].weight = _this.find('td:eq(2)').text();
                data[i].count_box = _this.find('td:eq(3)').text();
                data[i].count = _this.find('.number_input_box input').val();
                data[i].price = _this.find('.tr_price').text();
                data[i].sum = _this.find('.tr_sum').text();
            }
        });

         data = data.filter(function(x) {
            return x !== undefined;
        });

        var reklama = $('#reklama').prop('checked');
        var obrazci = $('#obrazci').prop('checked');

        return $.ajax({
            type: 'post',
            url: '/send-form.php',
            data: {data: data, 'reklama': reklama, 'obrazci': obrazci},
            success: function(data, textStatus, jqXHR) {
                //aaaa
            }
        });
    });

}).call(this);