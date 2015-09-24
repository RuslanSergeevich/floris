/**
 * Each section of the site has its own module. It probably also has
 * submodules, though this boilerplate is too simple to demonstrate it. Within
 * `src/app/home`, however, could exist several additional folders representing
 * additional modules that would then be listed as dependencies of this one.
 * For example, a `note` section could have the submodules `note.create`,
 * `note.delete`, `note.edit`, etc.
 *
 * Regardless, so long as dependencies are managed correctly, the build process
 * will automatically take take of the rest.
 *
 * The dependencies block here is also where component dependencies should be
 * specified, as shown below.
 */
angular.module( 'ngBoilerplate.home', [
  'ui.router',
  'plusOne',
  'ymaps'
])

/**
 * Each section or module of the site can also have its own routes. AngularJS
 * will handle ensuring they are all available at run-time, but splitting it
 * this way makes each module more "self-contained".
 */
.config(function config( $stateProvider ) {

  $stateProvider.state( 'home', {
    url: '/home',
    views: {
      "main": {
        controller: 'HomeCtrl',
        templateUrl: 'home/home.tpl.html'
      }
    },
    data:{ pageTitle: 'Home' }
  });
})
.config(function(ymapsConfig) {
    //нужно сменить preset у карты на специальный текстовый
    ymapsConfig.markerOptions.preset = 'islands#darkgreenStretchyIcon';
})

/**
 * And of course we define a controller for our route.
 */
.controller( 'HomeCtrl',['$scope', function HomeController( $scope) {

        $scope.markers = [
            {"coordinates":[44.952116,34.102411],"title":""},
            {"coordinates":[44.495203,34.166299],"title":""},
            {"coordinates":[44.616687,33.525432],"title":""},
            {"coordinates":[45.031929,35.382429],"title":""},
            {"coordinates":[45.190445,33.366861],"title":""},
            {"coordinates":[45.3562,36.467352],"title":""},
            {"coordinates":[45.709572,34.39165],"title":""},
            {"coordinates":[44.676379,34.410048],"title":""}
        ]
        ;
        //настройки положения карты
        $scope.map = {
            center: [44.952116,34.102411], zoom: 9
        };

        $scope.addMarker = function() {
            var myGeocoder = window.ymaps.geocode($scope.newMarker);
            myGeocoder.then(
                function (res) {
                    $scope.markers.push({
                        coordinates: res.geoObjects.get(0).geometry.getCoordinates(), title: $scope.newMarker
                    });
                    $scope.$apply();
                    $scope.newMarker = null;
                },
                function (err) {
                }
            );

        };



    }])

;

