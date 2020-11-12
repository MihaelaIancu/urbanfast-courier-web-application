@extends('layouts.appadmin')

<style>

.links > a {
                color: #3f2a1d !important;
                padding: 0 25px;
                font-size: 11px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
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

                    <div class="nav-justified nav-item" >Admin Console </div>
                    <!-- <li><a class="active content" href="{{ url('/customer/{user}') }}" style="color: #636b6f !important;">AWB</a></li> -->
                    <!-- <li><a href="#borderou" style="color: #636b6f !important;" >Courier</a></li>
                    <li><a href="#cost" style="color: #636b6f !important;" >Manager</a></li>
                    <li class="right"><a href="#about" style="color: #636b6f !important;">Foreman</a></li>
                    <li><a href="#cost" style="color: #636b6f !important;" >Ramburs</a></li> -->
                </div>
            </ul>

             <div class="card">
                <!-- <div class="card-header">Admin Console</div> -->

                <div class="card-body">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <li><a class="active content" href="{{ url('/customer/{user}') }}" style="color: #636b6f !important;">AWB</a></li> -->
                    <li><a href="{{ url('/courier/login') }}" style="color: #3f2a1d !important;" >Courier</a></li>
                    <li><a href="#cost" style="color: #3f2a1d !important;" >Manager</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">Foreman</a></li>
                    <li><a href="#cost" style="color: #3f2a1d !important;" >Ramburs</a></li>
                    
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
