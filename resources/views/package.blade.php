<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <li><a class="active content" href="{{ url('/customer') }}" style="color: #3f2a1d!important;">AWB</a></li>
                    <li><a href="{{ url('/#section-restrictions') }}" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="{{ url('/services') }}" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul>

            <!-- <div id="accordion"> -->

                <div class="card">
                    <!-- <div class="card-header" id="headingOne" style="background-color: #343a40 !important;"> -->
                        <!-- <button class="btn btn-link" data-parent="#accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <div style="color: white !important;">Click to see details<div>
                        </button> -->
                    <!-- </div> -->

                    <!-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne"> -->
                        <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif


                                        <!-- <form method="POST" action="{{ route('login') }}">
                                            @csrf -->
                                <form method="POST" action="order">
                                {{ csrf_field()}}
                                <!-- @csrf -->
                                        <div class="form-group row">
                                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                                            <div class="col-md-6">
                                                <input id="height" type="text" autocomplete="off" class="form-control @error('height') is-invalid @enderror" name="height" required>

                                                @error('height')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <p class="col-form-label" >
                                                    {{ __("cm") }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="width" class="col-md-4 col-form-label text-md-right">{{ __('Width') }}</label>

                                            <div class="col-md-6">
                                                <input id="width" type="text" name="width" autocomplete="off" class="form-control @error('width') is-invalid @enderror" required>

                                                @error('width')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <p class="col-form-label" >
                                                    {{ __("cm") }}
                                                </p>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="length" class="col-md-4 col-form-label text-md-right">{{ __('Length') }}</label>

                                            <div class="col-md-6">
                                                <input id="length" type="text" autocomplete="off" class="form-control @error('length') is-invalid @enderror" name="length" required>

                                                @error('length')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <p class="col-form-label" >
                                                    {{ __("cm") }}
                                                </p>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="weigth" class="col-md-4 col-form-label text-md-right">{{ __('Weigth') }}</label>

                                            <div class="col-md-6">
                                                <input id="weigth" type="text" name="weigth" autocomplete="off" class="form-control @error('weigth') is-invalid @enderror" required>

                                                @error('weigth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div>
                                                <p class="col-form-label" >
                                                    {{ __("kg") }}
                                                </p>
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                            <div class="col-md-6">
                                                <input id="content" type="text" name="content" autocomplete="off" class="form-control @error('content') is-invalid @enderror" required>

                                                @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="details" class="col-md-4 col-form-label text-md-right ">{{ __('Details - optional') }}</label>

                                            <div class="col-md-6">
                                                <input id="details" type="text" autocomplete="off" class="form-control @error('details') is-invalid @enderror" name="details" required>

                                                @error('details')
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
                                        <div>
                                </form>
                        </div>  
                    <!-- </div> -->
                </div>

                <!-- <div class="card">
                    <div class="card-header" id="headingTwo" style="background-color: #343a40 !important;">
                        <button class="btn btn-link collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div style="color: white !important;">Click to complete receiver details<div>
                        </button>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
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
                                        <div class="form-group row">
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
                        <!-- </div> -->
                        <!-- </form> -->
                    <!-- </div>
                </div> -->

            <!-- </div> -->
        </div>
    </div>
</div>

@endsection
