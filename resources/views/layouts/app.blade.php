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

    @include("component/style")

    @include("component/styleCustom")

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
                                <li class="nav-item active">
                                    <a class="nav-link" href="/customer" style="display: inline-grid;text-align: center;width: 90px">
                                        Home <span class="sr-only">(current)</span>
                                        <i class="fas fa-home" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/customer/map" style="display: inline-grid;text-align: center;width: 90px">
                                        <span>MAP</span>
                                        <i class="fas fa-map-marker-alt" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/customer/qr" style="display: inline-grid;text-align: center;width: 90px">
                                        <span>QRcode & CODE</span>
                                        <i class="fas fa-qrcode" style="font-size: 28px; color: #5F696C; margin-top: 10px;"></i>
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
