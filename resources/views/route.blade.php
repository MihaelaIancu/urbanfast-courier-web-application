
<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
  
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 480px;
        border: 1px solid #fff;
        margin-bottom: 10px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #3f2a1d;
      }

      #mode-selector {
        color: #fff;
        background-color: #3f2a1d;
        margin-left: 12px;
        padding: 5px 11px 10px 11px;
        border-radius: 5px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
  

</head>

<!-- <body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body> -->

@extends('layouts.app')


@section('content')


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <ul class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class = "container navbar-nav links">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <li><a class="active content" href="{{ url('/customer') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    <li><a href="{{ url('/#section-restrictions') }}" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="{{ url('/services') }}" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul>

            <!-- <div id="accordion"> -->

                <!-- <div class="card"> -->
                    <!-- <div class="card-header" id="headingOne" style="background-color: #3f2a1d !important;"> -->
                        <!-- <button class="btn btn-link" data-parent="#accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> -->
                            <p style="color: white !important;">Click below to choose your route</p>
                        <!-- </button> -->
                    <!-- </div> -->

                    <!-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne"> -->
                        <!-- <div class="card-body"> -->
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                <!-- <form method="POST" action="payment"> -->
                                   <form id="form">
                                   {{ csrf_field()}}
                                        
                                   <div style="display: block">
                                   @foreach($users as $user)
                                        <input id="origin-input" class="controls" type="text"
                                            value="{{$user->adress}}">
                                        
                                    @endforeach
                                    @foreach($receivers as $receiver)
                                        <input id="destination-input" class="controls" type="text"
                                        value="{{$receiver->receiver_adress}}">
                                        
                                    @endforeach
                                        <!-- <div id="mode-selector" class="controls">
                                        <input type="radio" name="type" id="changemode-walking" checked="checked">
                                        <label for="changemode-walking">Walking</label>

                                        <input type="radio" name="type" id="changemode-transit">
                                        <label for="changemode-transit">Transit</label>

                                        <input type="radio" name="type" id="changemode-driving">
                                        <label for="changemode-driving">Driving</label>
                                        </div> -->
                                    <input type="submit" style="margin-left: 9px !important;" value="GO"/>
                                    </div>
                                    </form>
                                    <div class="">
                                    <div id="map"></div>
                                    <div class="card">
                                        
                                        <div class="pt-3 pl-3" id="route">
                                        Routes are charged according to distance, number of turns and travel time. 
                                        The fees start from 15 RON for the optimal route, represented with orange color on the map at the time of submitting the request.
                                        </div>
                                    <span><a class="pl-3 btn btn-link" href="{{ url('/payment') }}">Click here</a>to continue to place your order </span>
                                    </div>
    </div>

                                    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&libraries=geometry"></script>
                                    <script>

                                    var map;
                                    var directionsService;
                                    var polylines = [];
                                    // polylines.length = 1;
                                    // var polylines = new Array(2);
                                    // var gmarkers = [];

                                    // This example requires the Places library. Include the libraries=places
                                    // parameter when you first load the API. For example:
                                    // <script
                                    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                    function initMap() {
                                    map = new google.maps.Map(document.getElementById('map'), {
                                    mapTypeControl: false,
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

                                    var start_location = document.getElementById('origin-input').value;
                                    var end_location = document.getElementById('destination-input').value;
                                    
                                    // var trafficLayer = new google.maps.TrafficLayer();
                                    // trafficLayer.setMap(map);

                                    // window.onload = initMap;

                                    google.maps.event.addDomListener(document.getElementById('form'), 'submit', function(e){
                                        calcRoute(
                                            document.getElementById('origin-input').value,
                                            document.getElementById('destination-input').value
                                        );                                  
                                        e.preventDefault();
                                        return false;
                                    });

                                    directionsService = new google.maps.DirectionsService();
                                    google.maps.Polyline.prototype.getBounds = function(startBounds){
                                        if(startBounds){
                                            var bounds = startBounds;
                                        }
                                        else {
                                            var bounds = new google.maps.LatLngBounds();
                                        }
                                        this.getPath().forEach(function(item, index){
                                            bounds.extend(new google.maps.LatLng(item.lat(), item.lng()));
                                        });
                                        return bounds;
                                    };
                                }

                                    // window.onload = initMap;

                                    function calcRoute(start, end){
                                        var request = {
                                            origin: start,
                                            destination: end,
                                            provideRouteAlternatives: true,
                                            unitSystem: google.maps.UnitSystem.METRIC,
                                            travelMode: google.maps.TravelMode['DRIVING']
                                        };

                                    // var start_marker = new google.maps.Marker({
                                    //     position: start,
                                    //     map: map,
                                    //     title: "start point"
                                    // });

                                    // var end_marker = new google.maps.Marker({
                                    //     position: end,
                                    //     map: map,
                                    //     title: "end point"
                                    // });

                                        directionsService.route(request, function(response, status){
                                            for(var j in polylines)
                                        {
                                            polylines[j].setMap(null);
                                        }
                                        polylines = [];

                                        // for (var i = 0; i < gmarkers.length; i++) {
                                        // gmarkers[i].setMap(null);
                                        // }
                                        // gmarkers = [];

                                       

                                        if(status == google.maps.DirectionsStatus.OK) {
                                            var bounds = new google.maps.LatLngBounds();
                                            for(var i = response.routes.length -1; i>=0; i--) {
                                                if(i==0) {
                                                    var color = '#ff4d00';
                                                }
                                                else {
                                                    var color = '#999999';
                                                }
                                               
                                                var line = drawPolyline(response.routes[i].overview_path, color);
                                                polylines.push(line);
                                                bounds = line.getBounds(bounds);
                                                google.maps.event.addListener(line, 'click', function(){
                                                    var index = polylines.indexOf(this);
                                                    highlightRoute(index);
                                                   
                                                });
                                            
                                                // var option = document.getElementByName('route_ch');

                                                // google.maps.event.addListener(option, 'checked', function(){
                                                //     var index = polylines.indexOf(this);
                                                //     highlightRoute(index);
                                                   
                                                // });
                                            }
                                            map.fitBounds(bounds);

                                        
                                        } 
                                    });
                                }

                                function makeMarker(position, icon, title, map) {
                                new google.maps.Marker({
                                    position: position,
                                    map: map,
                                    icon: icon,
                                    title: title
                                });
                            }                          
                                function highlightRoute(index){
                                    for(var j in polylines){
                                        if(j == index){
                                            var color = '#ff4d00';
                                            
                                        }
                                        else {
                                            var color = '#999999';
                                            
                                        }
                                        polylines[j].setOptions({strokeColor: color});
                                    }
                                }

                                function drawPolyline(path, color) {
                                    var line = new google.maps.Polyline({
                                        path: path,
                                        strokeColor: color,
                                        strokeOpacity: 0.7, 
                                        strokeWeight: 3
                                    });

                                    
                                    line.setMap(map);
                                    return line;
                                }
                                

                                google.maps.event.addDomListener(window, 'load', initMap);

                                    // new AutocompleteDirectionsHandler(map);
                                    // }

                                    /**
                                    * @constructor
                                    */
                                    // function AutocompleteDirectionsHandler(map) {
                                    // this.map = map;
                                    // this.originPlaceId = null;
                                    // this.destinationPlaceId = null;
                                    // this.travelMode = 'DRIVING';
                                    // this.directionsService = new google.maps.DirectionsService;
                                    // this.directionsRenderer = new google.maps.DirectionsRenderer;
                                    // this.directionsRenderer.setMap(map);

                                    // var originInput = document.getElementById('origin-input');
                                    // var destinationInput = document.getElementById('destination-input');
                                    // var modeSelector = this.travelMode;

                                    // var originAutocomplete = new google.maps.places.Autocomplete(originInput);
                                    // // Specify just the place data fields that you need.
                                    // originAutocomplete.setFields(['place_id']);

                                    // var destinationAutocomplete =
                                    // new google.maps.places.Autocomplete(destinationInput);
                                    // // Specify just the place data fields that you need.
                                    // destinationAutocomplete.setFields(['place_id']);

                                    // // this.setupClickListener('changemode-walking', 'WALKING');
                                    // // this.setupClickListener('changemode-transit', 'TRANSIT');
                                    // // this.setupClickListener('changemode-driving', 'DRIVING');

                                    // this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
                                    // this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

                                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
                                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                                    // destinationInput);
                                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
                                    // }

                                    // // Sets a listener on a radio button to change the filter type on Places
                                    // // Autocomplete.
                                    // AutocompleteDirectionsHandler.prototype.setupClickListener = function(
                                    // id, mode) {
                                    // var radioButton = document.getElementById(id);
                                    // var me = this;

                                    // radioButton.addEventListener('click', function() {
                                    // me.travelMode = mode;
                                    // me.route();
                                    // });
                                    // };

                                    // AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
                                    // autocomplete, mode) {
                                    // var me = this;
                                    // autocomplete.bindTo('bounds', this.map);

                                    // autocomplete.addListener('place_changed', function() {
                                    // var place = autocomplete.getPlace();

                                    // if (!place.place_id) {
                                    // window.alert('Please select an option from the dropdown list.');
                                    // return;
                                    // }
                                    // if (mode === 'ORIG') {
                                    // me.originPlaceId = place.place_id;
                                    // } else {
                                    // me.destinationPlaceId = place.place_id;
                                    // }
                                    // me.route();
                                    // });
                                    // };

                                    // AutocompleteDirectionsHandler.prototype.route = function() {
                                    // if (!this.originPlaceId || !this.destinationPlaceId) {
                                    // return;
                                    // }
                                    // var me = this;

                                    // this.directionsService.route(
                                    // {
                                    //     origin: {'placeId': this.originPlaceId},
                                    //     destination: {'placeId': this.destinationPlaceId},
                                    //     travelMode: this.travelMode,
                                    //     provideRouteAlternatives: true
                                    
                                    // },
                                    // function(response, status) {
                                    //     if (status === 'OK') {
                                    //     me.directionsRenderer.setDirections(response);
                                    //     } else {
                                    //     window.alert('Directions request failed due to ' + status);
                                    //     }
                                    // });
                                    // };

                                    </script>
                                    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&libraries=places&callback=initMap"
                                        async defer></script> -->


                                        <!-- <div class="form-group row mb-0">
                                            <div class="col-md-6 pt-2">
                                                <button type="submit" class="btn btn-dark">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        <div> -->
                        <!-- </div>  -->
                                <!-- </form> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>

@endsection
