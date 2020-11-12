<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\paymentAdress;
use DB;
use App\Adress;
use App\Payment;
use App\billData;
use App\paymentBill;
// use App\paymentAdress;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('route');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new billData();
        $data->user_fk_id = DB::table('users')->where('user_id', Auth::user()->user_id)->value('user_id');
        $data->sender_name = DB::table('users')->where('user_id', Auth::user()->user_id)->value('name');
        $data->sender_phone = DB::table('users')->where('user_id', Auth::user()->user_id)->value('phone');
        $data->receiver_name = DB::table('receivers')->where('user_fk_id', Auth::user()->user_id)->orderBy('updated_at', 'DESC')->limit(1)->value('name');
        $data->receiver_adress = DB::table('receivers')->where('user_fk_id', Auth::user()->user_id)->orderBy('updated_at', 'DESC')->limit(1)->value('adress');
        $data->receiver_zip = DB::table('receivers')->where('user_fk_id', Auth::user()->user_id)->orderBy('updated_at', 'DESC')->limit(1)->value('zip_code');
        $data->payment_adress = $request->input("autocomplete");
        $data->payment_zip = $request->input("postal_code");
        $data->pack_fk_id = DB::table('packages')->where('user_cnp', Auth::user()->cnp)->orderBy('updated_at', 'DESC')->limit(1)->value('pack_code');
        $data->details = DB::table('packages')->where('user_cnp', Auth::user()->cnp)->orderBy('updated_at', 'DESC')->limit(1)->value('details');
        $data->paym_value = $request->input("payment_value");
        $data->ramburs = $request->input("ramburs");
        $data->deliv_taxes = "15.00";
        $data->total = DB::raw('deliv_taxes + paym_value');
        $data->save();
        
        return redirect('/route');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
