<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<head>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">


@extends('layouts.app')

<style>

/* body{
  font-family: 'Lato', sans-serif;
  padding: 50px;
} */

.profile-bar{
  /* background-image: url(https://i.pinimg.com/originals/ae/84/18/ae8418bc8397210c37ba7fc802dbc020.jpg); */
  background-color: #f16820;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  max-height: 100%;
  max-width: 100%;
  color: #eee;
}

.profile-bar .contents{
  /* background-color: rgba(0,0,0,0.65); */
  background-color: #3f2a1d;
}

.profile-bar .contents img{
  display: block;
  width: 70px;
  margin: auto;
  padding-top: 25px;
}

.profile-bar .contents .profile-name{
  text-align: center;
  margin: 10px 0px;
  font-size: 15px;
  font-weight: 300;
}

.profile-bar .contents .profile-description{
  text-align: center;
  margin: 10px 0px;
  font-weight: 300;
}

.profile-bar .contents .buttons{
  text-align: center;
  background-color: #3f2a1d;
  /* rgba(31,45,61,.7); */
}

.profile-bar .contents .buttons ul{
  list-style: none;
  -webkit-padding-start: 0;
}

.profile-bar .contents .buttons ul li{
  display: inline-block;
  margin: 15px 20px;
}

.profile-bar .contents .buttons ul li a{
  color: #f16820;
  font-size: 30px;
  display: block;
  text-decoration: none;
  opacity: 0.7;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a:hover{
  opacity: 1;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a span{
  font-size: 10px;
  display: block;
}

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
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->
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

            <!-- <ul class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class = "container navbar-nav links"> -->
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <li><a class="active content" href="{{ url('/customer') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    <li><a href="{{ url('/#section-restrictions') }}" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="{{ url('/services') }}" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul>

        </div>
    </div>
</div> -->

<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-4">
    <div class="profile-bar">
      <div class="contents">
        <img src="https://cdn1.iconfinder.com/data/icons/black-easy/512/538303-user_512x512.png" alt="UserAvatar">
      <p class="profile-name">Hello, dear user!</p>
        <p class="profile-description">You haven't miss anything this week!</p>
        <div class="buttons">
          <ul>
            <li>
              <a href="{{ url('/customer') }}"><i class="ti-package"></i><span>Place An Order</span></a>
            </li>
            <li>
              <a href="{{ url('/history') }}"><i class="ti-timer"></i><span>History</span></a>
            </li>
            <li>
              <a href="{{ url('/tracking') }}"><i class="ti-target"></i><span>Track Your Order</span></a>
            </li>
          </ul>
          
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>

@endsection
