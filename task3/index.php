<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        html, body { height: 100%; margin: 0; padding: 0; }
        #map { height: 100%; }
    </style>
</head>
<body>
<div id="map"></div>
<script type="text/javascript">

    var map;
    function initMap() {

        //var places = {"Pune Municipal Corporation" , "Punjab National Bank", "Sancheti Hospital", "Rosary School", "EnvisioDevs" };
        var myLatLng = {lat: 18.5217622, lng: 73.8522495};
        var myLatLng2 = {lat: 18.5557994, lng: 73.8018904};
        var myLatLng3 = {lat: 18.5270572, lng: 73.8533418};
        var myLatLng4 = {lat: 18.5229677, lng: 73.8695638};
        var myLatLng5 = {lat: 18.5560991, lng: 73.7906023};

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 18.5203, lng: 73.8567},
            zoom: 14
        });


        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });



        var neighborhoods = [
        {lat: 18.5217622, lng: 73.8522495},
        {lat: 18.5557994, lng: 73.8018904},
        {lat: 18.5270572, lng: 73.8533418},
        {lat: 18.5229677, lng: 73.8695638},
        {lat: 18.5560991, lng: 73.7906023}
        ];

        var markers = [];


        for (var i = 0; i < neighborhoods.length; i++) {
            addMarker(neighborhoods[i], i * 200);
        }

        function addMarker(position, timeout) {
            window.setTimeout(function() {
                markers.push(new google.maps.Marker({
                    position: position,
                    map: map,
                    animation: google.maps.Animation.DROP
                }));
            }, timeout);
        }
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcy_gLhbDiK4TwAYQgW7NFPosLpeznWnM&callback=initMap">
</script>
</body>
</html>