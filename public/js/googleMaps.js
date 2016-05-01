/**
 * Created by royin_000 on 01/11/2015.
 */

function initialize() {
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
    var myLatLng = {lat: 53.51615403, lng: -6.40956784};
    var mapCanvas = document.getElementById('map');
    var DirectionsService;
   // document.getElementById('start').addEventListener("click", calculateAndDisplayRoute);

    //DirectionsService.route();


    //var DirectionsRequest
    //{
    //   origin: LatLng | String | google.maps.Place,
    //          destination: LatLng | String | google.maps.Place,
    //         travelMode: TravelMode,
    //         transitOptions: TransitOptions,
    //         unitSystem: UnitSystem,
    //         durationInTraffic: Boolean,
    //         waypoints[]: DirectionsWaypoint,
    //         optimizeWaypoints: Boolean,
    //          provideRouteAlternatives: Boolean,
    //        avoidHighways: Boolean,
    //       avoidTolls: Boolean,
    //       region: String
    //}
    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Cakes & More</h1>'+
        '<div id="bodyContent">'+
            '<img src="images/icon.png" >'+
        '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
        'Aboriginal people of the area. It has many springs, waterholes, '+
        'rock caves and ancient paintings. Uluru is listed as a World '+
        'Heritage Site.</p>'+
        '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
        'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
        '(last visited June 22, 2009).</p>'+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });



    var mapOptions = {
        //center: new google.maps.LatLng(44.5403, -78.5463),
        center: myLatLng,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP


    }
    var map = new google.maps.Map(mapCanvas, mapOptions)



    var marker = new google.maps.Marker({

        icon: "images/icon.png",
        iconSize: 2,
        position: myLatLng,
        map: map,
        title: 'Hello World!',
        //label: "SaoirsDawg",
        infoWindow: "test"


    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });


    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('right-panel'));

    var control = document.getElementById('floating-panel');
    control.style.display = 'block';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

    var onChangeHandler = function() {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    };
    if(document.getElementById('start').addEventListener('change', onChangeHandler)){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }


        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }
    }
   // document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {

   // var start = document.getElementById('start').value;

    //var start = new google.maps.LatLng(53.335383,-6.292419);
    var start = new google.maps.LatLng(53.404757, -6.378245);
    var end = new google.maps.LatLng(53.51615403, -6.40956784);
    directionsService.route({
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }

    });
}


//var infoWindow = new google.maps.InfoWindow({
//    content: " "
//});
//google.maps.event.addListener(marker, 'click', function() {
//    infoWindow.setContent('test: ' + '');
//    infoWindow.open(map, this);
//});
//markers.push(marker);
//marker.setAnimation(google.maps.Animation.BOUNCE);

google.maps.event.addDomListener(window, 'load', initialize);

//google.maps.event.addListener('click', function() {
  //  infowindow.open(map, marker);
//});
//google.maps.event.addListener(marker, "rightclick", function() {
//    marker.setIcon('blank.png'); // set image path here...
//});


