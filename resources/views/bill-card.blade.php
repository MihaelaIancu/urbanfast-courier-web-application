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
                <div class="card-header text-white">Order Status</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                   <p class="pl-2 pb-1"> Your order was processsed successufully. Thank you!
                    {{ csrf_field()}}
                    You can follow your package status by clicking on the link below.</p>
                    <a class="btn btn-link" href="{{ url('/tracking') }}">Package Tracking</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
