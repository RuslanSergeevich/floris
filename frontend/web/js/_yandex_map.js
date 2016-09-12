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

        /*
         |-----------------------------------------------------------
         |   my custom input
         |-----------------------------------------------------------
         */
        var suggestView = new ymaps.SuggestView('suggest'),
            geo = {
                'start': function(name){
                    ymaps.geocode(name).then(function (res) {
                        myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates(),8);
                    });
                }
            };
        suggestView.events.add('select', function (event) {
            var name = event.get("item");
            return geo.start(name.displayName);
        });
        $('#city__search').submit(function(e){
            e.preventDefault();
            return geo.start($(this).find('#suggest').val());
        });

    });
}