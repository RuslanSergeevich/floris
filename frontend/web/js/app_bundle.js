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
        'weight_id'      : parseInt($('.cataloge-filter .weight li.active').attr('data-weight_id'))
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

/*
 |-----------------------------------------------------------
 |   yandex API
 |-----------------------------------------------------------
 */
window.onload = function(){ ymaps.ready(init); };
function init(){
    var points = [
        [55.831903,37.411961],[55.763338,37.565466],[55.763338,37.565466],[55.744522,37.616378],[55.780898,37.642889],
        [55.793559,37.435983],[55.800584,37.675638],[55.716733,37.589988],[55.775724,37.56084],[55.822144,37.433781],
        [55.87417,37.669838],[55.71677,37.482338],[55.78085,37.75021],[55.810906,37.654142],[55.865386,37.713329]
        //[37.525797,55.847121],[37.710743,55.778655],[37.717934,55.623415],[37.737,55.863193],[37.760113,55.86677],
        //[37.730838,55.698261],[37.564769,55.6338],[37.5394,55.639996],[37.405853,55.69023],[37.5129,55.77597],
        //[37.44218,55.775777],[37.440448,55.811814],[37.404853,55.751841],[37.728976,55.627303],[37.597163,55.816515],
        //[37.689397,55.664352],[37.600961,55.679195],[37.658425,55.673873],[37.605126,55.681006],[37.431744,55.876327],
        //[37.778445,55.843363],[37.549348,55.875445],[37.702087,55.662903],[37.434113,55.746099],[37.712326,55.83866],
        //[37.415725,55.774838],[37.630223,55.871539],[37.571271,55.657037],[37.711026,55.691046],[37.65961,55.803972],
        //[37.452759,55.616448],[37.442781,55.781329],[37.74887,55.844708],[37.406067,55.723123],[37.48498,55.858585]
    ];

    var map = new ymaps.Map('myMap', { center: [56.034, 36.992], zoom: 7 });
    var myGeoObjects = [];
    var point;
    for (var i = 0, ii = points.length; i < ii; i++) {
        point = points[i];
        myGeoObjects[i] = new ymaps.GeoObject({
            geometry: { type: "Point", coordinates: point },
            properties: {
                clusterCaption: 'Геообъект №'+(i+1),
                balloonContentBody: 'Содержимое балуна геообъекта №2.'
            }
        });
    }

    //myGeoObjects[0] = new ymaps.GeoObject({
    //    geometry: { type: "Point", coordinates: [56.021, 36.983] },
    //    properties: {
    //        clusterCaption: 'Геообъект №2',
    //        balloonContentBody: 'Содержимое балуна геообъекта №2.'
    //    }
    //});

    // Создадим кластеризатор и запретим приближать карту при клике на кластеры.
    var clusterer = new ymaps.Clusterer();
    clusterer.add(myGeoObjects);
    map.geoObjects.add(clusterer);
}