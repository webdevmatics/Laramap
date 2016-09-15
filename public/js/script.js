$(document).ready(function() {
    var myLatLng = new google.maps.LatLng(-33.8665433, 151.1956316);

    //Create Map
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 12
    });
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
    var request = {
        location: myLatLng,
        radius: '2500',
        types: ['school']
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
});