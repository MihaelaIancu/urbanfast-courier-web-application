<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>

<!-- <script type="text/javascript">
 function method(){
   var selectvalue = $('input[name=choice]:checked', '#method').val();


if(selectvalue == "cash"){
window.open('http://www.google.com','_self');
return true;
}
else if(selectvalue == "card"){
window.open('https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_radio','_self');
return true;
}
return false;
}; -->


<!-- </script> -->

</head>

@extends('layouts.app')

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

            <!-- <ul class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class = "container navbar-nav links">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <li><a class="active content" href="{{ url('/customer') }}" style="color: #3f2a1d !important;">AWB</a></li>
                    <li><a href="#borderou" style="color: #3f2a1d !important;" >Package Details</a></li>
                    <li><a href="#cost" style="color: #3f2a1d !important;" >Payment</a></li>
                    <li class="right"><a href="#about" style="color: #3f2a1d !important;">News</a></li>
                </div>
            </ul> -->

            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        <form method="POST" action="{{ action('MethodController@store') }}">
                    <!-- {{ csrf_field()}} -->

                    {{ csrf_field()}}

            <div class="card">
                <div class="card-body p-0">
                    <div class="row pt-5 pl-3 pr-3">
                        <div class="col-md-6 pl-3">
                            <img src="/images/logo.png">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #
                            @foreach($bills as $bill)
                            {{$bill->id_paymbill}}</p>
                            
                            <p class="text-muted">Due to: 
                            {{$bill->updated_at}}</p>
                            @endforeach
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-3 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Receiver Details</p>
                            <p class="mb-1">
                            @foreach($dates as $data)
                            {{$data->receiver_name}}</p>
                            <p>{{$data->receiver_adress}}</p>
                            <p>{{$data->receiver_zip}}</p>
                            
                            <p class="font-weight-bold mb-4">Payment Adress</p>
                            <p class="mb-1">{{$data->payment_adress}}</p>
                            <p class="mb-1">{{$data->payment_zip}}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Sender Details</p>
                            
                            <p class="mb-1"><span class="text-muted">Client ID: {{$data->user_fk_id}}</span> 
                            <p class="mb-1"><span class="text-muted">Name: {{$data->sender_name}}</span> </p>
                            <p class="mb-1"><span class="text-muted">Phone: {{$data->sender_phone}}</span> </p>
                           
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Package ID</th>
                                        <!-- <th class="border-0 text-uppercase small font-weight-bold">Item</th> -->
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Value</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Ramburs</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$data->pack_fk_id}}</td>
                                        <!-- <td>Software</td> -->
                                        <td>{{$data->details}}</td>
                                        <td>{{$data->paym_value}} RON</td>
                                        <td>{{$data->ramburs}} RON</td>
                                        <td>{{$data->paym_value}} RON </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>Software</td>
                                        <td>Support</td>
                                        <td>234</td>
                                        <td>$6356</td>
                                        <td>$23423</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Software</td>
                                        <td>Sofware Collection</td>
                                        <td>4534</td>
                                        <td>$354</td>
                                        <td>$23434</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse text-white p-1" style="height: 100px; background-color: #3f2a1d">  
                        <div class="py-3 px-5 text-center">
                       
                            <div class="mb-1">Grand Total</div>
                            <div class="h5 font-weight-light">{{$data->total}} RON</div>
                        </div>

                        <div class="py-3 px-5 text-center">
                            <div class="mb-1">Delivery Taxes</div>
                            <div class="h5 font-weight-light">{{$data->deliv_taxes}} RON</div>
                        </div>

                        <div class="py-3 px-5 text-center">
                            <div class="mb-1">Sub - Total amount</div>
                            <div class="h5 font-weight-light">{{$data->paym_value}} RON</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mb-2 pt-3 pl-5" id="method">
                        <strong><p>How do you want to pay? Please select your method:</p></strong>
                        <input type="radio" id="cash" name="pay_meth" value="cash">
                        <label for="cash">Cash/Ramburs to courier</label><br>
                        <input type="radio" id="card" name="pay_meth" value="card">
                        <label for="card">Card</label><br>
                    <!-- </form> -->
                    </div>

                    <div class="form-group row mb-0 pt-3 pl-3">
                        <div class="col-md-6 pb-3">
                            <button type="submit" class="btn btn-dark" id="submit">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    <div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- 
<script>

 $('#cash').click(function(event){
     window.location.replace("http://127.0.0.1:8000/bill");
 });

$('#card').click(function(event){
     window.location.replace("http://127.0.0.1:8000/card");
 });
 </script> -->

@endsection
