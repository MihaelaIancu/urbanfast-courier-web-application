<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
  

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
      #origin-input {
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

            <div id="accordion">

                <div class="card">
                    <div class="card-header" id="headingOne" style="background-color: 	#3f2a1d !important;">
                        <button class="btn btn-link" data-parent="#accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <div style="color: white !important;">Click to complete sender details<div>
                        </button>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                        <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <!-- <form method="POST" action="{{ route('login') }}">
                                            @csrf -->
                                <form method="POST" action="sender">
                                    @csrf
                                        <!-- <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" autocomplete="off" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="cnp" class="col-md-4 col-form-label text-md-right">{{ __('CNP') }}</label>

                                            <div class="col-md-6">
                                                <input id="cnp" type="text" name="cnp" autocomplete="off" maxlength="30" class="form-control @error('cnp') is-invalid @enderror" required>

                                                @error('cnp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" name="phone" autocomplete="off" maxlength="12" class="form-control @error('phone') is-invalid @enderror" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


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
                                        </div> -->

                                        <!-- <div class="form-group row">
                                            <label for="adress2" class="col-md-4 col-form-label text-md-right ">{{ __('Address 2 - Optional') }}</label>

                                            <div class="col-md-6">
                                                <input id="adress2" type="text" autocomplete="off" class="form-control @error('adress2') is-invalid @enderror" name="adress2" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="adress3" class="col-md-4 col-form-label text-md-right ">{{ __('Address 3 - Optional') }}</label>

                                            <div class="col-md-6">
                                                <input id="adress3" type="text" autocomplete="off" class="form-control @error('adress3') is-invalid @enderror" name="adress3" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group row">
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
                                                <input id="origin-input" name="origin-input" autocomplete="off"
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
  document.getElementById('origin-input'), {types: ['geocode']});

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

                                        <div class="form-group row mb-0 pt-3">
                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-dark">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        <div>
                        </div>  <!-- </form> -->
                    </div>
                </div>

                <!-- <div class="card">
                    <div class="card-header" id="headingTwo" style="background-color: #3f2a1d !important;">
                        <button class="btn btn-link collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div style="color: white !important;">Click to complete receiver details<div>
                        </button>
                    </div> -->

                    <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                        <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif -->

                                        <!-- <form method="POST" action="{{ route('login') }}">
                                            @csrf -->
                                 <!-- <form method="POST" action="receiver">
                                    @csrf

                                    We have to proceed sender informations first. -->
                                        <!-- <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                                            <div class="col-md-6">
                                                <input id="adress" type="text" name="adress" autocomplete="off" class="form-control @error('adress') is-invalid @enderror" required>

                                                @error('adress')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Address 2 - Optional') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-group row">
                                            <label for="zip" class="col-md-4 col-form-label text-md-right ">{{ __('ZIP Code') }}</label>

                                            <div class="col-md-6">
                                                <input id="zip" type="text" name="zip" maxlength="6" autocomplete="off" class="form-control @error('zip') is-invalid @enderror" required>

                                                @error('zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-dark">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        <div> -->
                        <!-- </div></form> -->
                    <!-- </div> -->
                <!-- </div> -->

            </div>
        </div>
    </div>
</div>

@endsection
