<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\payMeth;
use App\User;
use App\Payment;
use App\paymentBill;
use App\Package;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $method = new payMeth();
        // $method->method = $request->input("pay_meth");
        // $method->cnp_fk = DB::table('senders')->where('user_fk_id', Auth::user()->user_id)->value('cnp');
        // $method->save();

        $bill = new paymentBill();
        $bill = DB::table('payment_bills')->where('user_fk_id', Auth::user()->user_id)->orderBy('updated_at', 'DESC')->limit(1)->value('id_paymbill');

        $cnp = new User();
        $cnp = DB::table('users')->where('user_id', Auth::user()->user_id)->orderBy('updated_at', 'DESC')->limit(1)->value('cnp');
        // $pay->methods()->associate($method);
        // $pay->update(['method_id'=>$method->method]);

        DB::table('packages')
        // ->methods()->associate($method)
        ->where('user_cnp', $cnp)
        ->update(['payment_method'=>$request->input("pay_meth")]);

        DB::table('payments')
        // ->methods()->associate($method)
        ->where('bill_id', $bill)
        ->update(['payment_method'=>$request->input("pay_meth")]);

        DB::table('packages')
        ->where('user_cnp', $cnp)
        ->whereNull('status')
        ->update(['status'=>'processed']);
        // $status = new Package();
        // $status->status = 'processed';
        // $status->update(["status"]=>'processed');

        if ($request->input("pay_meth") == "cash") {
            return view('/bill');
        } 
        else if ($request->input("pay_meth") == "card") 
        {
            return view('/card');
        }
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

    public function payment_meth(Request $request){

        if ($request->input("pay_meth") == "cash") {
            return view('/bill');
        } 
        else if ($request->input("pay_meth") == "card") 
        {
            return view('/card');
        }
    }
}
