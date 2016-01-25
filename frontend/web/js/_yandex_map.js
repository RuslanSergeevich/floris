/*
 |-----------------------------------------------------------
 |   yandex map
 |-----------------------------------------------------------
 */
ymaps.ready(init);
function init () {
    $.post('api/geocode-tool', function(res){
        var myMap = new ymaps.Map('myMap', {
                center: [62.581149, 78.819595],
                zoom: 3,
                behaviors: ['default', 'scrollZoom']
            }, {
                searchControlProvider: 'yandex#search'
            }),
            points = res['features'],
            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedVioletClusterIcons'
            }),
            getPointData = function (index,image) {
                return {
                    balloonContentBody: '<div class="shop-info">' + image +
                    '<ul class="client-description"><li><b>' + points[index]['shop_name'] + '</b></li>' +
                    '<li>' + points[index]['phone'] + '</li>' +
                    '<li></li>' +
                    '</ul></div>'
                };
            },
            geoObjects = [];

        myMap.behaviors.disable('scrollZoom');

        for(var i = 0, len = points.length; i < len; i++){
            var image = (typeof points[i]['images'][0] !== "undefined")
                ? '<div class="image-shop"><img src="/userfiles/geography/' + points[i]['images'][0]['basename'] + '.' + points[i]['images'][0]['ext'] + '"></div>'
                : '';
            geoObjects[i] = new ymaps.Placemark(points[i]['coords'], getPointData(i,image));
        }
        clusterer.add(geoObjects);
        myMap.geoObjects.add(clusterer);
    });
}

/*
 |-----------------------------------------------------------
 |   city search form
 |-----------------------------------------------------------
 */
(function(){

    //$('form input[name=city]').keyup(function(){
    //    var map = $('#myMap'),
    //        _this = $(this),
    //        value = _this.val(),
    //        mask = '-search__suggest-list';
    //    map.find('input').val(value).focus();
    //    var suggest_list = map.find('[class*='+mask+']').html();
    //    _this.focus();
    //    suggest_list = suggest_list.replace(/ymaps/g,'div');
    //});

    $('#city__search').submit(function(e){
        e.preventDefault();
        var _this = $(this),
            map = $('#myMap'),
            mask = '-search__button',
            city = _this.find('input').val();
        map.find('input').val(city);
        map.find('[class*='+mask+']').click();

    });

})();