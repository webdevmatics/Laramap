var map;
var myLatLng;
$(document).ready(function() {
    geoLocationInit();

    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
        createMap(myLatLng);
        nearbySearch(myLatLng, "school");
    }

    function fail() {
        alert("it fails");
    }
    //Create Map
    function createMap(myLatLng) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }
    //Create marker
    function createMarker(latlng, icn, name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: name
        });
    }
    //Nearby search
    function nearbySearch(myLatLng, type) {
        var request = {
            location: myLatLng,
            radius: '2500',
            types: [type]
        };
        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    console.log(place);
                    latlng = place.geometry.location;
                    icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                    name = place.name;
                    createMarker(latlng, icn, name);
                }
            }
        }
    }
});