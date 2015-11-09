(function() {

    $('.cataloge-menu').on('click', 'a', function(){
        sortable();
    });
    $('.cataloge-filter .weight ul').on('click', 'li', function(){
        $('.cataloge-filter .weight ul li').removeClass('active');
        $(this).addClass('active');
        sortable();
    });

    $('#fileInputTrigger').click(function(e){
        e.preventDefault();
        $('#search-shop input[type=file]').click();
    });

    setTimeout('$(".flash_message").fadeOut()', 5000);


    $('form').submit(function(){
        if($(this).find('div').hasClass('has-error')){
            $(this).find('div.has-error').effect( "shake" );
        }
    });
    $('body').ready(function() {
        return $('.cataloge-menu li a').on('click', function(e) {
            e.preventDefault();
            $('.cataloge-menu li').removeClass('active');
            return $(this).parent('li').addClass('active');
        });
    });
}).call(this);

/*
 |-----------------------------------------------------------
 |   Функция фильтрации товаров
 |-----------------------------------------------------------
 */
function sortable()
{
    var data = {
        'type_id'        : parseInt($('.cataloge-menu .active a').attr('data-type_id')) || 0,
        'composition_id' : parseInt($('.comp .selecter-selected').attr('data-composition_id')),
        'packing_id'     : parseInt($('.pack .selecter-selected').attr('data-packing_id')),
        'weight_id'      : parseInt($('.filter-weight .selecter-selected').attr('data-weight_id'))
        },
        prop,
        result = true,
        box = $('.b-product-list'),
        box_li = $('.b-product-list li');

    box_li.each(function(){
        var li = $(this);
        for(prop in data){
            if(data[prop] != 0 && data[prop] != li.attr('data-' + prop)){
                result = false;
                break;
            } else if(data[prop] != 0 && data[prop] == li.attr('data-' + prop)) {
                result = true;
            }
        }
        result == true ? li.removeClass('hidden') : li.addClass('hidden');
    });

    box.each(function(){
        var _this = $(this);
        _this.find('li').not('li.hidden').length == 0 ? _this.addClass('hidden') : _this.removeClass('hidden');
    });
}