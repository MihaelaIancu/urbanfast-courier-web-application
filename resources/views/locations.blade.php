
@extends('layouts.app')

<style>
/* .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
} */

#map {
    height: 480px;
        border: 1px solid #fff;
        margin-bottom: 10px;
      }

</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Customer Console</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Details about services
                </div>
            </div> -->

            <ul class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class = "container navbar-nav links">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                    <li><a href="{{ url('/customer') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    @else
                    <li><a href="{{ route('login') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    @endauth

                    <!-- <li><a class="active content" href="{{ url('/customer/{user}') }}" style="color: #636b6f !important;">AWB</a></li> -->
                    <li><a href="{{ url('/#section-restrictions') }}" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="{{ url('/services') }}" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul>
            <!-- &ll=44.43248924918332%2C25.88280404047987&z=10 -->

            <!-- <div class="map-responsive pl-5 pt-2">
            <iframe frameborder="0" style="border: 1px solid black" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/u/0/embed?mid=1LErlBmZZcC91Ew4snWC6fh4OFVAh_2vh&ll=44.43248924918332%2C25.88280404047987&z=10" width="640" height="480" allowfullscreen></iframe>
            </div> -->
            <div id="map" class=""></div>

        <script>


      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 44.4268, lng: 26.1025},
            zoom: 11,
                                    styles: [
                                        {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                                        {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                                        {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                                        {
                                        featureType: 'administrative.locality',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                        },
                                        {
                                        featureType: 'poi',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                        },
                                        {
                                        featureType: 'poi.park',
                                        elementType: 'geometry',
                                        stylers: [{color: '#263c3f'}]
                                        },
                                        {
                                        featureType: 'poi.park',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#6b9a76'}]
                                        },
                                        {
                                        featureType: 'road',
                                        elementType: 'geometry',
                                        stylers: [{color: '#38414e'}]
                                        },
                                        {
                                        featureType: 'road',
                                        elementType: 'geometry.stroke',
                                        stylers: [{color: '#212a37'}]
                                        },
                                        {
                                        featureType: 'road',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#9ca5b3'}]
                                        },
                                        {
                                        featureType: 'road.highway',
                                        elementType: 'geometry',
                                        stylers: [{color: '#746855'}]
                                        },
                                        {
                                        featureType: 'road.highway',
                                        elementType: 'geometry.stroke',
                                        stylers: [{color: '#1f2835'}]
                                        },
                                        {
                                        featureType: 'road.highway',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#f3d19c'}]
                                        },
                                        {
                                        featureType: 'transit',
                                        elementType: 'geometry',
                                        stylers: [{color: '#2f3948'}]
                                        },
                                        {
                                        featureType: 'transit.station',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                        },
                                        {
                                        featureType: 'water',
                                        elementType: 'geometry',
                                        stylers: [{color: '#17263c'}]
                                        },
                                        {
                                        featureType: 'water',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#515c6d'}]
                                        },
                                        {
                                        featureType: 'water',
                                        elementType: 'labels.text.stroke',
                                        stylers: [{color: '#17263c'}]
                                        }
                                    ]
        });

        window.onload = initMap;

        var sector1 = [
          {lat: 44.435278, lng: 26.102778}, // south west
          {lat: 44.438899, lng: 26.073195}, // south east
          {lat: 44.494904, lng: 25.994537}, // north west
          {lat: 44.514174, lng: 26.014287},
          {lat: 44.538598, lng: 26.103164}  // north east
        ];

        var sector2 = [
          {lat: 44.435631, lng: 26.103106}, // south east
          {lat: 44.441348, lng: 26.190138}, // south west
          {lat: 44.444289, lng: 26.177435},
          {lat: 44.453113, lng: 26.176234},
          {lat: 44.456053, lng: 26.156493},
          {lat: 44.479329, lng: 26.177950}, // north west
          {lat: 44.488515, lng: 26.103449},  // north east
        ];

        var sector3 = [
          {lat: 44.435631, lng: 26.103106}, // north west
        //   {lat: 44.435362, lng: 26.118890},
        //   {lat: 44.439124, lng: 26.142236}, // south east
        //   {lat: 44.437040, lng: 26.169530}, // south west
          {lat: 44.441452, lng: 26.194593},  // north east
          {lat: 44.426866, lng: 26.221372},
          {lat: 44.406512, lng: 26.209527},
          {lat: 44.395842, lng: 26.211244},
          {lat: 44.394616, lng: 26.179487},
          {lat: 44.409082, lng: 26.123713},
          {lat: 44.424871, lng: 26.109319},
          {lat: 44.430011, lng: 26.100408},
          {lat: 44.434294, lng: 26.097495},
        ];

        var sector4 = [
          {lat: 44.429950, lng: 26.099822}, // north west
          {lat: 44.424801, lng: 26.108062}, // south east
          {lat: 44.408862, lng: 26.123168}, // south west
          {lat: 44.398315, lng: 26.160934},  // north east
          {lat: 44.371080, lng: 26.143081},
          {lat: 44.343587, lng: 26.163337},
          {lat: 44.339413, lng: 26.156127},
          {lat: 44.336957, lng: 26.155784},
          {lat: 44.335975, lng: 26.150291},
          {lat: 44.348988, lng: 26.128318},
          {lat: 44.352916, lng: 26.129005},
          {lat: 44.361262, lng: 26.111152},
          {lat: 44.359790, lng: 26.106002},
          {lat: 44.372062, lng: 26.088149},
          {lat: 44.404692, lng: 26.096046},
          {lat: 44.422840, lng: 26.089523}
        ];

        var sector5 = [
        //   {lat: 44.495184, lng: 25.984547}, // north west
        {lat: 44.434957, lng: 26.097209}, // south east
        //   {lat: 44.435278, lng: 26.102778}, // south west
        //   {lat: 44.435631, lng: 26.103106},
        {lat: 44.434294, lng: 26.097495},
        {lat: 44.429563, lng: 26.097896},
        //   {lat: 44.421364, lng: 26.101082},
          {lat: 44.422093, lng: 26.088418},  // north east
          {lat: 44.403447, lng: 26.096007},
          {lat: 44.370570, lng: 26.087596},
          {lat: 44.377551, lng: 26.047468},
          {lat: 44.375706, lng: 26.044887},
          {lat: 44.383228, lng: 26.033371},
          {lat: 44.387201, lng: 26.038930},
          {lat: 44.391032, lng: 26.034165},
          {lat: 44.388904, lng: 26.029201},
          {lat: 44.405644, lng: 26.011331},
          {lat: 44.402240, lng: 26.003190},
          {lat: 44.404084, lng: 26.001800},
          {lat: 44.403517, lng: 25.997829},
          {lat: 44.408056, lng: 25.995843},
          {lat: 44.417275, lng: 26.056602},
          {lat: 44.434150, lng: 26.059977},
          {lat: 44.437978, lng: 26.070104},
        //   {lat: 44.436276, lng: 26.084003},
        {lat: 44.438899, lng: 26.073195}
        ];

        var sector6 = [
          {lat: 44.438899, lng: 26.073195}, // north west
          {lat: 44.437978, lng: 26.070104}, // south east
          {lat: 44.434491, lng: 26.060157},
          {lat: 44.417275, lng: 26.056602}, // south west
          {lat: 44.408056, lng: 25.995843},  // north east
          {lat: 44.406865, lng: 25.976736},
          {lat: 44.439849, lng: 25.966633},
          {lat: 44.443147, lng: 26.012529},
          {lat: 44.447475, lng: 26.020323},
          {lat: 44.450153, lng: 26.016570},
          {lat: 44.454068, lng: 26.012818},
          {lat: 44.456129, lng: 26.015993},
          {lat: 44.459013, lng: 26.013107},
          {lat: 44.467048, lng: 25.979911},
          {lat: 44.469932, lng: 25.978757},
          {lat: 44.478789, lng: 25.991457},
          {lat: 44.470550, lng: 26.024941},
        //   {lat: 44.457571, lng: 26.054962},
        //   {lat: 44.459837, lng: 26.058714},
        //   {lat: 44.440674, lng: 26.073147},

        ];

        map.data.add({geometry: new google.maps.Data.Polygon([sector1, sector2, sector3, sector4, sector5, sector6])})
      }

     

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&callback=initMap">
    </script>

        </div>
    </div>
</div>
@endsection
