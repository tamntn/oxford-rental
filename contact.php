<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 4/30/17
 * Time: 6:07 PM
 */
    require_once ('session.php');
    require_once ('included_functions.php');
    $mysqli = db_connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href="signin.css" rel="stylesheet">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwxNYwro2Hho1z_qt7OrhtZJIh_5z2-jA&callback=initMap"></script>

    <style>
        .navbar .navbar-collapse {
            text-align: center;
        }

        /* Make map responsive */
        #map{
            overflow: hidden;
            padding-bottom: 65%;
            padding-top: 30px;
            position: relative;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">OXFORD CAR RENTAL</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href="reserve.php">Reserve</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
            </ul>
            <?php
            if(logged_in()){
                echo "<ul class='nav navbar-nav navbar-right'>";
                echo "<li><a href='account.php'><span class='glyphicon glyphicon-user'></span> My Account</a></li>";
                echo "<li><a href='signout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                echo "</ul>";
            }
            else{
                echo "<ul class='nav navbar-nav navbar-right'>";
                echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                echo "<li><a href='signin.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                echo "</ul>";
            }
            ?>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <br/><br/>
    <div class="page-header">
        <h1><div class="text-center">Customer Support</div></h1>
    </div>
    <br/>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <!--left middle-->
        <div class="col-lg-3" id="leftCol">
            <div class="panel panel-default" style="border-color: #122b40">
                <div class="panel-heading" style="text-align: center; font-size: large; border-color: #122b40">Contact Information</div>
                <div class="panel-body" style="text-align: center">
                    <h4>Phone Number:</h4><p>(601)-466-6677</p>
                    <h4>Email:</h4><p>oxfordcarrental@gmail.com</p>
                </div>
            </div>
        </div><!--/left-->

        <!--right middle-->
        <div class="col-lg-7">
            <div id="map"></div>
            <br/>
        </div>
        <div class="col-lg-1"></div>
    </div></   <hr/>
</div>

</body>

<script>
    $(function () {

        function initMap() {

            var main_location = new google.maps.LatLng(34.364682, -89.538432);

            var styles = [
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 13
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#144b53"
                        },
                        {
                            "lightness": 14
                        },
                        {
                            "weight": 1.4
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#08304b"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#0c4152"
                        },
                        {
                            "lightness": 5
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#0b434f"
                        },
                        {
                            "lightness": 25
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#0b3d51"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#146474"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#021019"
                        }
                    ]
                }
            ]



            var mapCanvas = document.getElementById('map');
            var mapOptions = {
                center: main_location,
                zoom: 15,
                panControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);

            // Multiple Markers
            var markers = [
            //    ['Vaught Hemingway Stadium', 34.362058, -89.534212]
            ];

            // Info Window Content
            var infoWindowContent = [
                ['<div class="info_content">' +
                '<h3>Jackson Avenue West</h3>' +
                '<p>The long road that bounds half campus</p>' +        '</div>'],
                ['<div class="info_content">' +
                '<h3>Vaught Hemingway Stadium</h3>' +
                '<p>Hotty toddy</p>' +
                '</div>']
            ];

            var markerIcon = "image/neon.png"
            // Placing multiple markers from marker array
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: markerIcon,
                    title: markers[i][0],
                    animation: google.maps.Animation.DROP,
                    animation: google.maps.Animation.BOUNCE
                });
            }

            // Create marker for main_position
            marker = new google.maps.Marker({
                position: main_location,
                map: map,
                icon: markerIcon,
                title: "MAIN LOCATION",
                animation: google.maps.Animation.DROP,
                animation: google.maps.Animation.BOUNCE
            });


            map.set('styles', styles);

            // Change map position when screen size is changed.
            google.maps.event.addDomListener(window, "resize", function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
            });
        }

        google.maps.event.addDomListener(window, 'load', initMap);

    });
</script>

</html>


<?php
    new_footer('TAM NGUYEN', $mysqli);
?>