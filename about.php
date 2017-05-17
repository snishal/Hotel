<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/book.css">
	<title>About Us</title>
</head>

<body>
    <?php
    require 'header.html';
    ?>
    <script type="text/javascript" src="script/applybackground.js"></script>
    <div style="width:100%; height:1000px;">
    <div id="map" style="width:100%;height:40%;background:grey"></div>
    </div>
    <script>
        function myMap() {
            var myLatlng = new google.maps.LatLng(28.605101, 77.037996);
            var mapOptions = {
            zoom: 13,
            center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Little Palm Island"
        });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALG0jCwuulv9oHtI8MoaBcTVapryNsd6I&callback=myMap"></script>

    <?php
        require 'footer.html';
    ?>
</body>

</html>