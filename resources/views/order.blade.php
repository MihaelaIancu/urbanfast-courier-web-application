<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<style>
      #locationField, #controls {
        position: relative;
        width: 500px;
        display: block; 
        padding-right: 2px;
        margin: 0 auto;
        /* margin: 0 0 20 0; */
        /* margin-bottom: 10px; */
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
        font-family: "Roboto";
      }
      #address {
        border: 1px solid #3f2a1d;
        background-color: #fff;
        width: 480px;
        padding-right: 2px;
        padding-top: 10px;
        padding-bottom: 5px;
        display: block; 
        margin: 0 auto;
        /* margin: 0 auto !mporitant; */
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>


</head>

<!-- <body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body> -->
<script> 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

@extends('layouts.app')


<style>
    #map{
      /* height:400px;
      width:100%; */
       width: 640px;
       height: 480px;
       border: 1px solid black;
       /* margin-left:1; */
       /* padding-left:1; */
       margin:0 auto;
    }
</style>

@section('content')
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
  <!-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> -->

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
                    <li><a class="active content" href="{{ url('/customer') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    <li><a href="{{ url('/#section-restrictions') }}" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="{{ url('/services') }}" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul>

            <div class="card">
                <div class="card-body">

                    <form method="POST" action="route">
                    {{ csrf_field()}}

                    <div class="form-group row">
                        <label for="payers" class="col-md-4 col-form-label text-md-right">{{ __('Payment by ') }}
                        </label>
                            <div class="col-md-6">
                                <!-- <input id="height" type="text" autocomplete="off" class="form-control @error('height') is-invalid @enderror" name="height" required> -->


                                <select name="payers" id="payers" class="col-form-label text-md-right" required>
                                    <option value="" selected>Select an option</option>
                                    <option value="sender">Sender</option>
                                    <option value="receiver">Receiver</option>
                                </select>
                            </div>

                             <!-- @error('payers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                    </div>

                    <div class="form-group row">
                        <label for="ramburs" class="col-md-4 col-form-label text-md-right">{{ __('Ramburs') }}
                        </label>
                            <div class="col-md-6">
                                <input id="ramburs" type="text" autocomplete="off" class="form-control @error('ramburs') is-invalid @enderror" name="ramburs" required>
                            </div>

                            @error('ramburs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <p class="col-form-label" >
                                {{ __("RON") }}
                                </p>

                            <div>
                                <a class="btn btn-link pl-5" href="{{ route('services') }}"> 
                                {{ __("Don't know what value to fill in? Click here and go to the section about ramburs values") }}
                                </a>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="ram_payers" class="col-md-4 col-form-label text-md-right">{{ __('Ramburs payment by ') }}
                        </label>
                            <div class="col-md-6">
                                <!-- <input id="height" type="text" autocomplete="off" class="form-control @error('height') is-invalid @enderror" name="height" required> -->


                                <select name="ram_payers" id="ram_payers" class="col-form-label text-md-right" required>
                                    <option value="" selected>Select an option</option>
                                    <option value="sender">Sender</option>
                                    <option value="receiver">Receiver</option>
                                </select>
                            </div>

                             <!-- @error('payers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                    </div>

                    <div class="form-group row">
                        <label for="payment_value" class="col-md-4 col-form-label text-md-right">{{ __('Payment Value') }}
                        </label>
                            <div class="col-md-6">
                                <input id="payment_value" type="text" autocomplete="off" class="form-control @error('payment_value') is-invalid @enderror" name="payment_value" required>
                            </div>

                            @error('payment_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            
                            <div>
                               <p class="col-form-label" >
                                {{ __("RON  - e.g. 146.56") }}
                                </p>
                            </div>
                    </div>

                    <strong><p class="col-form-label pl-3" >
                                {{ __("Where to send the bill?") }}
                        </p></strong>

                    <!-- <div class="form-group row">
                        <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                        <div class="col-md-6">
                            <input id="adress" type="text" name="adress" autocomplete="off" class="form-control @error('adress') is-invalid @enderror" required>

                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zip" class="col-md-4 col-form-label text-md-right ">{{ __('ZIP Code') }}</label>

                        <div class="col-md-6">
                            <input id="zip" type="text" name="zip" maxlength="6" autocomplete="off" class="form-control @error('zip') is-invalid @enderror" required>

                        @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div> -->

                                    <div>

                                        <div id="locationField">
                                            <input id="autocomplete" name="autocomplete" autocomplete="off"
                                                    placeholder="Enter your address"
                                                    onFocus="geolocate()"
                                                    type="text"/>
                                        </div>

                                        <table id="address">
                                            <tr>
                                                <td class="label">Street address</td>
                                                <td class="slimField"><input class="field" id="street_number" disabled="true"/></td>
                                                <td class="wideField" colspan="2"><input class="field" id="route" disabled="true"/></td>
                                            </tr>
                                            <tr>
                                                <td class="label">City</td>
                                                <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"/></td>
                                            </tr>
                                            <tr>
                                                <td class="label">State</td>
                                                <td class="wideField"><input class="field" id="administrative_area_level_1" disabled="true"/></td>
                                                <td class="label">Zip code</td>
                                                <td class="wideField"><input class="field" id="postal_code" name="postal_code" disabled="true" required/></td>
                                            </tr>
                                            <tr>
                                                <td class="label">Country</td>
                                                <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"/></td>
                                            </tr>
                                        </table>
                                    </div>

                                    


<script>
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
  document.getElementById('autocomplete'), {types: ['geocode']});

// Avoid paying for data that you don't need by restricting the set of
// place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

// When the user selects an address from the drop-down, populate the
// address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

window.onload = initAutocomplete;

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&libraries=places&callback=initAutocomplete"
        async defer></script>


    <!-- <strong><p class="col-md-6 pb-2 pt-3">Your routes</p></strong>


    <div id="map"></div>

<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13
  });

  new AutocompleteDirectionsHandler(map);
}

// window.onload = initMap;

function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'DRIVING';
  this.directionsService = new google.maps.DirectionsService;
  this.directionsRenderer = new google.maps.DirectionsRenderer;
  this.directionsRenderer.setMap(map);

  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');

//   this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
//   this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
      destinationInput);
}
AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
    autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Please select an option from the dropdown list.');
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  this.directionsService.route(
      {
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode
      },
      function(response, status) {
        if (status === 'OK') {
          me.directionsRenderer.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
};
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&libraries=places&callback=initMap"
        async defer></script> -->

                    <div class="form-group row mb-0 pt-3">
                        <div class="col-md-6 pb-3">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    <div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
