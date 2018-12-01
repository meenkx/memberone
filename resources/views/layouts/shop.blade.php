<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config("app.name", "Laravel") }}</title>--}}
    <title>Member One</title>

    <!-- Scripts -->
    <script src="{{ asset("js/app.js") }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />

    <!-- Styles -->
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    {{--    <link rel="stylesheet" href="{{ asset('/css/slick-modals/css/sm-minified.css') }}">--}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>--}}

    <style>
        @font-face {
            font-family: supermarket;
            src: url({{ asset('/font/supermarket.ttf') }});
        }
        body , html{
            font-family: supermarket;
        }
        .w3-dropdown-hover:first-child, .w3-dropdown-click:hover{
            background-color: transparent;
        }
        .w3-dropdown-hover{
            vertical-align: middle;
            line-height: 0px;
        }
        .setBox{
            top:100px;
        }

        .bg-light {
            background-color: #DDF6FB !important;
        }
        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #ccc;
            margin: 1em 0;
            padding: 0;
        }

        .dropdown-menu{
            top: 60px !important;;
            left: 25% !important;
            width: 50% !important;;
        }
        input[type=search] {
            -webkit-appearance: textfield;
            -webkit-box-sizing: content-box;
            font-family: inherit;
            font-size: 100%;
        }
        input::-webkit-search-decoration,
        input::-webkit-search-cancel-button {
            display: none;
        }

        input[type=search] {
            background: url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 20px center;
            border: solid 1px #ccc;
            padding: 9px 10px 9px 50px;
            width: 55px;

            -webkit-border-radius: 10em;
            -moz-border-radius: 10em;
            border-radius: 10em;

            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }
        input[type=search]:focus {
            width: 130px;
            background-color: #fff;
            border-color: #DDF6FB;

            -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
            -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
            box-shadow: 0 0 5px rgba(109,207,246,.5);
        }


        input:-moz-placeholder {
            color: #999;
        }
        input::-webkit-input-placeholder {
            color: #999;
        }
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }

        .qrcode-stream__camera, .qrcode-stream__pause-frame{
            border-radius: 10px !important;
        }
    </style>

</head>
<body>
    <div id="app">

        <div id="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DDF6FB">

                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('/img/logomini.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarColor03" style="margin-right: 350px;">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/shop" style="display: inline-grid;text-align: center;width: 90px">
                                        Home <span class="sr-only">(current)</span>
                                        <i class="fas fa-home" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'shop' ? 'active' : '' }}">
                                    <a class="nav-link" href="/shop/" style="display: inline-grid;text-align: center;width: 90px">
                                        <span>QRcode & CODE</span>
                                        <i class="fas fa-qrcode" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'shop/detail' ? 'active' : '' }}">
                                    <a class="nav-link" href="/shop/detail" style="display: inline-grid;text-align: center;width: 90px">
                                        <span>Shop Detail</span>
                                        <i class="fas fa-info" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                   {{--<form class="form-inline">--}}
                       {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                       {{--<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>--}}
                   {{--</form>--}}

                   </nav>
               </div>
           </div>
        </div>

       <div class="row">
           <div class="col-12">
               @yield("content")
           </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbpldfy9RKA0dyKispih3k9POKNij2Od8&callback=initMap"></script>

    <script>
        $(function() {
            $( ".shopSelect" ).change(function() {
                var data = $( this ).val().split(",");
                // console.log(data[0]);
                // console.log(data[1]);

                var map = document.getElementById("demo");
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(initMap);
                } else {
                    map.innerHTML = "Geolocation is not supported by this browser.";
                }

                function initMap(position) {
                    var YourLocation = {lat: position.coords.latitude, lng: position.coords.longitude};

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 16,
                        center: YourLocation
                    });

                    var marker = new google.maps.Marker({
                        position: YourLocation,
                        map: map,
                        title: 'Your Location here !!',
                        icon: '{{ asset('/img/userMap.png') }}'
                    });

                    var shopOwnerSelect = new google.maps.LatLng(data[0], data[1]);
                    var marker2 = new google.maps.Marker({
                        position: shopOwnerSelect,
                        map: map,
                        title: "shopOwnerSelect",
                        animation: google.maps.Animation.BOUNCE,
                        draggable: true
                    });

                    // calculate distance
                    function calculateDistance() {
                        var service = new google.maps.DistanceMatrixService();
                        service.getDistanceMatrix(
                            {
                                origins: [YourLocation],
                                destinations: [shopOwnerSelect],
                                travelMode: google.maps.TravelMode.DRIVING,
                                unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                                // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                                avoidHighways: false,
                                avoidTolls: false
                            }, callback);
                    }
                    // get distance results
                    function callback(response, status) {
                        if (status != google.maps.DistanceMatrixStatus.OK) {
                            $('#result').html(err);
                        } else {
                            var origin = response.originAddresses[0];
                            var destination = response.destinationAddresses[0];
                            if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                                $('#result').html("Better get on a plane. There are no roads between " + origin + " and " + destination);
                            } else {
                                var distance = response.rows[0].elements[0].distance;
                                var duration = response.rows[0].elements[0].duration;
                                console.log(response.rows[0].elements[0].distance);
                                var distance_in_kilo = distance.value / 1000; // the kilom
                                var distance_in_mile = distance.value / 1609.34; // the mile
                                var duration_text = duration.text;
                                var duration_value = duration.value;
                                // $('#in_mile').text(distance_in_mile.toFixed(2));
                                document.getElementById("distance").innerHTML = distance_in_kilo.toFixed(2) + " กิโลเมตร";
                                //     $('#duration_text').text(duration_text);
                                //     $('#duration_value').text(duration_value);
                                //     $('#from').text(origin);
                                //     $('#to').text(destination);
                                // }
                            }
                        }
                    }

                    calculateDistance();
                }

            });
        });

    </script>


</body>
</html>
