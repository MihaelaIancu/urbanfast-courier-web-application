<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UrbanFast') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .site-footer {
  padding: 4em 0;
  background: #f6f6f6; }
  @media (min-width: 768px) {
    .site-footer {
      padding: 8em 0; } }
  .site-footer .border-top {
    border-top: 1px solid rgba(255, 255, 255, 0.1) !important; }
  .site-footer p {
    color: #737373; }
  .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5 {
    color: black; }
  .site-footer a {
    color: #999999; }
    .site-footer a:hover {
      color: #f16820; }
  .site-footer ul li {
    margin-bottom: 10px; }
  .site-footer .footer-heading {
    font-size: 16px;
    color: black; }

   
    </style>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />

</head>
<body class="site-blocks-cover overlay" style="background-color: #251911" =data-stellar-background-ratio="1" id="section-home">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <div><img src="/svg/UrbanFast.svg" style="height: 22px; border-right: 1px solid #3f2a1d" class="pr-3"></div>
                    <div class="pl-3" style="color: #3f2a1d">UrbanFast Courier</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card animate__animated animate__fadeInUp" style="width: 100% !important" >
                <div class="card-header text-white">
                <p>Standard Service</p>
                <p>A standard type of service which implies collection, sorting, transport and delivery of 
                envelopes (max 500 grams) and parcels (max 30 kg and 60x50x30 cm), 
                in a minimum term of one and maximum 3 working days, using a road transport solution.</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <p> <img src="/images/logo.png" width="30" height="30"> Using the <strong> Standard service </strong>, you will benefit of collection, sorting, transport and delivery of envelopes
                    (max 500 grams) and parcels (max 30 kg and 60x50x30 cm), in a minimum term of one and maximum 3 working days from the pick-up moment. 
                    This term may vary based on weight, dimensions and destination.</p>
                    <p><strong>SCHEDULE</strong></p>
                    <ul>
                    <li>
                    Monday-Friday: 9:00 – 18:00
                    </li>
                    <li>
                    Saturday-Sunday: 9:00 – 14:00
                    </li>
                    </ul>
                    <p><strong>ADDITIONAL SERVICES</strong></p>
                    <ul>
                    <li>
                    The AWB option allows printing AWBs and registration of dispatches with UrbanFast Courier; this way, the customer benefits 
                    of low delivery-receipt time of dispatches towards the courier, can view the delivery certification by the receiver 
                    on the transport document and has information about the intermediate statuses;
                    </li>
                    <li>
                    The delivery certification can be offered by phone, fax or tracking the delivery after the AWB number, on 
                    <a href="{{ url('/') }}" class="btn-link">UrbanFast</a>;</li>
                    <li>
                    Dispatches payment at destination;
                    </li>
                    <li>
                    Two delivery attempts, if the receiver is not found at the address;
                    </li>
                    <li>
                    Contact by phone of the receipient for deliveries under special conditions;
                    </li>
                    <li>
                    Storage of dispatches with wrong addresses or with other time statuses of maximum 7 calendar days, before return;
                    </li>
                    <li>
                    The dispatches refused by the recipient will be returned to sender with expediency.
                    </li>
                    </ul>
                    <p><strong>TARIFFS</strong></p>
                    <table class="table text-center" style="width: 65% !important; margin-left: 25px !important;">
                    <thead>
                        <tr>
                            <th>
                            TYPE OF DELIVERY
                            </th>
                            <th>
                            Without WAT (RON)
                            </th>
                            <th>
                            With WAT (RON)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            Local envelope	
                            </td>
                            <td>
                            13.00
                            </td>
                            <td>
                            15.47	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Packages - first kg			
                            </td>
                            <td>
                            15.00
                            </td>
                            <td>
                            17.85	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Packages - additional kg (weight 1-30kg)			
                            </td>
                            <td>
                            1.70
                            </td>
                            <td>
                            2.02	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Additional km fee			
                            </td>
                            <td>
                            0.80**
                            </td>
                            <td>
                            0.95**	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Return documents			
                            </td>
                            <td>
                            12.00
                            </td>
                            <td>
                            14.28	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Return of cash in envelopes			
                            </td>
                            <td>
                            12.00 + 2% of refunded amount
                            </td>
                            <td>
                            14.28 + 2% of refunded amount	
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Return of cash in delivery through bank transfer			
                            </td>
                            <td>
                            6.50
                            </td>
                            <td>
                            7.74	
                            </td>
                        </tr>
                    </tbody>       
                    </table>
                    <div class="pl-3" style="font-size: 11px !important;">
                    <span>
                    Shipments without AWB issued by the client from online applications: 2.00 lei (without VAT) / 2.38 lei (with VAT)**</span>
                    <br /><span>
                    *The displayed prices include the value excluding VAT and the VAT included</span>
                    <br /><span style="color: #f16820 !important">Saturday-Sunday Delivery: 6.00 lei / 7.14 lei (with TVA)**</span>
                    <br /><span>0.80 lei (without VAT) / 0.95 lei (with VAT) per additional km done outside UrbanFast Courier locations, in one direction**</span>
                    <br /><span>***The shipping cost corresponding to the type of service chosen is added.
                    </span>
                    </div>
                    <p class="pt-3"><strong>UrbanFast Courier reserves the right not to insure this delivery service in the minimum one and 
                        maximum 3 working days, with the obligation to inform the customers about this fact before picking up the order, under the following conditions:</strong></p>
                
                        <ul>
                            <li>
                            Unfavourable weather conditions independent of the company’s will (fog, heavy snow, snow blocks, heavy rains, 
                            floods, yellow/orange/red code, frost, closed/non-operable roads etc.);</li>
                            <li>Large number of registered and in operation orders;</li>        
                            <li>Large volume of orders in relation to the existent logistic facility under special 
                                conditions or crowded year periods (Christmas, Black Friday, Easter, March 1st and 8th etc.);</li>
                        </ul>
                        <p class="pt-3" style="color: #f16820 !important">Attention! The customer’s approval at order pick-up by UrbanFast Courier under the previously specified conditions 
                            equals with its acceptance of the non-execution risk in the minimum one and maximum 3 working days.</p>
                    </div>
                                
            </div>
           

        </div>
    </div>
</div>
        </main>
    </div>

    <footer class="site-footer animate__animated animate__fadeInUp" id="section-contact">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5 mr-auto">
                <h2 class="footer-heading mb-4">With confidence, towards the future.</h2>
                <p>Every day, over 200.000 packages are carefully packed and handed over to the couriers to carry them forward to partners, friends and loved ones. We travel through the world together and with each delivery we carry forward the messages which are separated by distances. 
                    Where do you want to send the next shipment?</p>
              </div>
              
              <div class="col-md-4">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="{{ url('/#section-how-it-works') }}">How It Works</a></li>
                  <li><a href="{{ url('/locations') }}">Locations</a></li>
                  <li><a href="{{ url('/#section-estimate') }}">Cost Estimate</a></li>
                  <li><a href="{{ url('/#section-contact') }}">Contact Us</a></li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-dark text-white" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

</body>
</html>


