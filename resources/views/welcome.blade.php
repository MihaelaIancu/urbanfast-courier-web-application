<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>UrbanFast</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css2?family=Turret+Road:wght@500&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">  -->
        <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/css/fonts/flaticon/font/flaticon.css">



    <link rel="stylesheet" href="/css/css/aos.css">

    <link rel="stylesheet" href="/css/css/style.css">
        
        <!-- Styles -->
        <style>
        #card-success {
          background-color: white;
          width: 500px;
          margin: 0 auto 10px;
          height: 50px;
          border-radius: 8px;
          padding: 0 20px;
          font-weight: 400;
          box-sizing: border-box;
          line-height: 46px;
          letter-spacing: .5px;
          text-transform: none;
        }

        #card-success p {
          margin: 0 5px;
          display: inline-block;
        }

        .hidden {
          display: none;
        }



      #locationField, #controls {
        position: relative;
        width: 500px;
        display: block; 
        padding-right: 2px;
        margin: 0 auto;
        /* margin: 0 0 20 0; */
        /* margin-bottom: 10px; */
      }
      #autocomplete-start, #autocomplete-end{
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
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

    <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

    <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2 site-logo">
            <h1 class="mb-0"><a href="index.php" class="text-white mb-0" style="font-size:17px !important;">UrbanFast Courier</a></h1>
          </div>
          <div class="col-11 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
              @if (Route::has('login'))
                <!-- <div class="nav-link"> -->
                    @auth
                        <li><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a><li>
                        @endif
                    @endauth
                <!-- </div> -->
             @endif
                <li><a href="#section-estimate" class="nav-link">Cost Estimate</a></li>
                <li class="has-children">
                  <a href="#section-about" class="nav-link">About Us</a>
                  <ul class="dropdown">
                    <li><a href="#section-how-it-works" class="nav-link">How It Works</a></li>
                    <li><a href="#section-restrictions" class="nav-link">Package Restrictions</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('/services') }}" class="nav-link">Services</a></li>
                <li><a href="{{ url('/locations') }}" class="nav-link">Locations</a></li>
                <!-- <li><a href="#section-blog" class="nav-link">Package Restrictions</a></li> -->
                <li><a href="#section-contact" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

         </div>

        </div>
    </div>
    </header>

        <!-- <div class="flex-center position-ref full-height"> -->

            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <!-- <div class="content">
                <div class="title m-b-md">
                    UrbanFast Courier Services
                </div> -->

                <!-- <div class="links">
                    <a href="{{ url('/services') }}">Services</a>
                    <a href="{{ url('/locations') }}">Locations</a>
                    @auth
                    <a href="{{ url('/customer') }}">Let's Start</a>
                    @else
                    <a href="{{ route('login') }}">Let's Start</a>
                    @endauth
                    <a href="https://blog.laravel.com">Contacts</a>
                    <a href="https://nova.laravel.com">Package Restrictions</a>
                    <a href="https://forge.laravel.com">Payment Details</a>
                    <a href="https://vapor.laravel.com">Cost Estimate</a>
                </div> -->
            <!-- </div> -->
        <!-- </div> -->

    <div class="site-blocks-cover overlay" style="background-image: url(/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            

            <h2 class="text-white font-weight-light font-weight-bold" data-aos="fade-up">Your Pakage, Our Passion</h2>
            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">A Delivery Company</p>
            @auth
            <p data-aos="fade-up" data-aos-delay="200"><a href="{{ url('/customer') }}" class="btn btn-primary py-3 px-5 text-white">Let' s Start</a></p>
            @else
            <p data-aos="fade-up" data-aos-delay="200"><a href="{{ route('login') }}" class="btn btn-primary py-3 px-5 text-white">Let' s Start</a></p>
            @endauth
          </div>
        </div>
      </div>
    </div> 

    <div class="site-section" id="section-about">
      <div class="container">
        <div class="row mb-5">
          
          <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/img_3.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 order-md-1" data-aos="fade-up">
            <div class="text-left pb-1 border-primary mb-4">
              <h2 class="text-primary">About Us</h2>
            </div>
            <p>We want to be a reliable partner of all those who choose our services, with the same passion and dedication for each delivery.
               We decrease the distances between people and the pace never slows because we have the most dedicated couriers, a wonderful team <strong>always ready to receive new members</strong>.</p>
            <p class="mb-5">We keep up with the new trends in technology, constantly investing in both new services with added value for customers and the development and improvement of 
              those who represent us, couriers who care that all deliveries arrive in the best conditions at the destination.
              Investments in IT in recent years, larger, modern local offices, training and fleet renewal helped facilitate the process of sorting, transport and forwarding, 
              placing UrbanFast Courier among the most modern domestic companies.
              Year after year, the number of localities included without additional kilometers increases, our shipping services being available through strong partnerships.</p>
              
              
            <ul class="ul-check list-unstyled success">
              <li>Top brand, happy clients</li>
              <li>The market leader status, acquired through professionalism, 
                safety and speed, is a guarantee of the quality of our services, tailored each time to the specific requirements of our customers.</li>
              <li>Regardless of the size and nature of your business, we’re here to offer you the best solution delivery, anywhere, anytime with pleasure.</li>
            </ul>
            
          </div>
          
        </div>
      </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_bg_4.jpg');" id="section-how-it-works">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" data-aos="fade">How It Works</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="how-it-work-item">
              <span class="number">1</span>
              <div class="how-it-work-body">
                <h2>Make An Order</h2>
                <p class="mb-5">To place an order, you need to login in the application. 
                  If you don't have an account, do not worry. You can navigate to the registration page in the application and you can customize your personal profile.
                  Once registered, you will provide us with data related to your personal numerical code, telephone number and address and, also the receiver's data.</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Login to your account</li>
                  <li class="text-white">Where do we come to pick up your package?</li>
                  <li class="text-white">Where we are going to deliver it?</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="how-it-work-item">
              <span class="number">2</span>
              <div class="how-it-work-body">
                <h2>Make A Payment</h2>
                <p class="mb-5"> After completing all the details necessary for delivery, the payment summary will be issued. 
                  Payment for processing the desired order can be made both cash and card, to the sender or the receiver. </p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Cash</li>
                  <li class="text-white">Card</li>
                  <li class="text-white">Reimbursement</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="how-it-work-item">
              <span class="number">3</span>
              <div class="how-it-work-body">
                <h2>Track Your Order</h2>
                <p class="mb-5">Once the order has been processed, you can follow the evolution of your package status in our application, using the account created.</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Easy</li>
                  <li class="text-white">Responsibility</li>
                  <li class="text-white">Anywhere, with pleasure</li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section" id="section-estimate">
      <div class="container " style="height: 250px !important;">
        <div class="row mb-5">

    <!-- <form method="POST" action="payment"> -->
      <!-- {{ csrf_field()}} -->

          <div class="col-md-5 pr-3 pb-3" data-aos="fade-up" data-aos-delay="100">
            <img src="images/parcel_1.jpg" style="height: 250px; width: 250px;" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 order-md-1" data-aos="fade-up">
            <div class="text-center pb-1 border-primary mb-4">
              <h2 class="text-primary">Estimate your cost</h2>
            </div>

            <div class="form-group row">
            
              <label for="start" style="margin-right: 10px; !important" class="col-form-label text-md-right">{{ __('Start Point') }}</label>
                <!-- <div> -->
                  <div id="locationField">
                  
                      <input id="autocomplete-start" name="autocomplete-start" autocomplete="off"
                              placeholder="Enter your address"
                              onFocus="geolocate()"
                              type="text"/>
                  </div>

                <!-- <table id="address">
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
                </table> -->
              <!-- </div> -->
            </div>

            <div class="form-group row">
            <label for="end" style="margin-right: 10px; !important" class="col-form-label text-md-right">{{ __('End Point') }}</label>
              <!-- <div> -->
                <div id="locationField">
               
                    <input id="autocomplete-end" name="autocomplete-end" autocomplete="off"
                            placeholder="Enter your address"
                            onFocus="geolocate()"
                            type="text"/>
                </div>
                
                <!-- <table id="address">
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
                </table> -->
              <!-- </div> -->
            </div>
          
            <div class="form-group row pt-3">
                <input class="btn btn-dark" id="estimate" type="submit" name="submit" value="Get estimation">
                </div>
     
            <div id="card-success" class="hidden">
              <i class="fa fa-check"></i>
                <p>RON</p>
            </div>
            
<script>
var placeSearch, autocompletestart, autocompleteend;
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
  autocompletestart = new google.maps.places.Autocomplete(
  document.getElementById('autocomplete-start'), {types: ['geocode']});
  autocompleteend = new google.maps.places.Autocomplete(
  document.getElementById('autocomplete-end'), {types: ['geocode']});

// Avoid paying for data that you don't need by restricting the set of
// place fields that are returned to just the address components.
  autocompletestart.setFields(['address_component']);
  autocompleteend.setFields(['address_component']);

// When the user selects an address from the drop-down, populate the
// address fields in the form.
  autocompletestart.addListener('place_changed', fillInAddress);
  autocompleteend.addListener('place_changed', fillInAddress);
}

window.onload = initAutocomplete;

// function fillInAddress() {
//   // Get the place details from the autocomplete object.
//   var place = autocompletestart.getPlace();
//   var place = autocompleteend.getPlace();

//   for (var component in componentForm) {
//     document.getElementById(component).value = '';
//     document.getElementById(component).disabled = false;
//   }

//   // Get each component of the address from the place details,
//   // and then fill-in the corresponding field on the form.
//   for (var i = 0; i < place.address_components.length; i++) {
//     var addressType = place.address_components[i].types[0];
//     if (componentForm[addressType]) {
//       var val = place.address_components[i][componentForm[addressType]];
//       document.getElementById(addressType).value = val;
//     }
//   }
// }

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

<script>
$(document).ready(function () {

$('#estimate').click(function (event) {
  $('#card-success').removeClass('hidden');
}

});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW2XlxEtro-GF0rtwjeM3TOMR0GqIHL_g&libraries=places&callback=initAutocomplete"
        async defer></script>
        
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_bg_4.jpg');" id="section-restrictions">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" data-aos="fade">What package do we pick it up?</h2>
          </div>
        </div>
        <p class="mb-5 text-white">From the point of view of the restrictions on the type of packages that can be delivered, we distinguish the exclusion from delivery of the following objects:</p>
                <ul class="ul-check list-unstyled success">
                  <li class="text-white">Prohibited by legal provisions - firearms, ammunition, explosives, radioactive materials, flammable, toxic, narcotic defined in the criminal code</li>
                  <li class="text-white">With special conditions of transport, by legal administrative and sanitary provisions - live plants and animals, remains, perishable products, funeral ashes</li>
                  <li class="text-white">Improperly packaged packages</li>
                </ul>

                <h3 class="font-weight-light text-primary">How to pack properly?</h3>
                <table class="table text-center text-white" style="width: 65% !important; margin-left: 35px !important; margin-top: 20px !important;">
                    <thead>
                        <tr>
                            <th>
                            Product category
                            </th>
                            <th>
                            Type of product
                            </th>
                            <th>
                            Suitable packaging
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr> 
                            <td rowspan="7" style="vertical-align: middle; border-right: 1px solid #dee2e6;">
                            Fragile goods / Breakable Goods
                            </td>
                            <td>
                            Glass, windshields, glass bottles with liquids
                            </td>
                            <td>
                            Wood packaging filled with polystyrene	
                            </td>
                        </tr>
                        <tr>
                         
                        <td>
                            Cosmetics
                            </td>	
                            <td>
                            Multilayer carton filled with polystyrene and sealed with bubble wrap
                            </td>
                        </tr>
                        <tr>
                         
                         <td>
                         Paintings / Engravings
                             </td>	
                             <td>
                             Wood packaging filled with polystyrene
                             </td>
                         </tr>
                         <tr>
                         
                         <td>
                         Auto parts, appliance
                             </td>	
                             <td>
                             Pressed cardboard filled with polystyrene
                             </td>
                         </tr>
                         <tr>
                         
                         <td>
                         Disks, Tapes, CDs
                             </td>	
                             <td>
                             Cardboard or plastic filled with bubble wrap
                             </td>
                         </tr>
                         <tr>
                         
                         <td>
                         Fishing gear
                             </td>	
                             <td>
                             Multi layer cardboard filled with bubble wrap
                             </td>
                         </tr>
                         <tr>
                         
                         <td>
                         Furniture, musical instruments, toys
                             </td>	
                             <td>
                             Pressed cardboard filled with polystyrene sealed with protective plastic wrap
                             </td>
                         </tr>
                         <tr>
                            <td>
                            White goods
                            </td>
                            <td>
                            Refrigerator, washing machine, stove
                            </td>
                            <td>
                            Wood packaging filled with polystyrene	
                            </td>
                        </tr>
                        </tbody>       
                    </table>
        <!-- <div class="row mb-5"> -->
          
          <!-- <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/parcel_1.jpg" alt="Image" class="img-fluid rounded">
          </div> -->
          <!-- <div class="col-md-6 order-md-1" data-aos="fade-up">
            <div class="text-left pb-1 border-primary mb-4">
              <h2 class="text-primary">What package do we pick it up?</h2>
            </div>
            <p></p>
            <p class="mb-5"></p> -->
            
            <!-- <ul class="ul-check list-unstyled success">
              <li></li>
              <li></li>
              <li></li>
            </ul> -->
            
          <!-- </div> -->

          <!-- <a href="{{ url('/') }}" class="btn-link pt-3">How to pack properly?</a> -->
          
          
        </div>
      </div>
    </div>

    <!-- <div class="site-section border-bottom" id="section-our-team">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" data-aos="fade">Our Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="person">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Christine Rooster</h3>
              <p class="position text-muted">Co-Founder, President</p>
              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="person">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Brandon Sharp</h3>
              <p class="position text-muted">Co-Founder, COO</p>
              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="person">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Connor Hodson</h3>
              <p class="position text-muted">Marketing</p>
              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <footer class="site-footer" id="section-contact">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5 mr-auto">
                <h2 class="footer-heading mb-4">With confidence, towards the future.</h2>
                <p>Every day, over 200.000 packages are carefully packed and handed over to the couriers to carry them forward to partners, friends and loved ones. We travel through the world together and with each delivery we carry forward the messages which are separated by distances. 
                    Where do you want to send the next shipment?</p>
              </div>
              
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#section-about">About Us</a></li>
                  <li><a href="{{ url('/services') }}">Services</a></li>
                  <li><a href="#section-how-it-works">How It Works</a></li>
                  @auth
                  <li><a href="{{ url('/customer') }}">Place An Order</a></li>
                  @else
                  <li><a href="{{ route('login') }}">Place An Order</a></li>
                  @endauth
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-2"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-2 pr-2"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-2 pr-2"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-2 pr-2"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <!-- </p>
            </div>
          </div> -->
        <div class="row"> 
          <div class="col-md-2 pt-5" style="font-size: 12px !important;">
            <a href="{{ url('/admin/login') }}" class="nav-link">Admin Mode</a>
          </div>
        </div>
          
        </div>
      </div>
    </footer>
  <!-- </div> -->

  <script src="/js/js/jquery-3.3.1.min.js"></script>
  <script src="/js/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/js/jquery-ui.js"></script>
  <script src="/js/js/jquery.easing.1.3.js"></script>
  <script src="/js/js/popper.min.js"></script>
  <script src="/js/js/bootstrap.min.js"></script>
  <script src="/js/js/owl.carousel.min.js"></script>
  <script src="/js/js/jquery.stellar.min.js"></script>
  <script src="/js/js/jquery.countdown.min.js"></script>
  <script src="/js/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/js/bootstrap-datepicker.min.js"></script>
  <script src="/js/js/aos.js"></script>
  <script src="/js/js/main.js"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  <script src="/appear.js"></script>
    </body>
</html>
