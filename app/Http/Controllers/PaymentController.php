<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
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

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment');
    }

    // public function sender()
    // {
    //     $senders = DB::table('senders')->orderBy('updated_at', 'DESC')->limit(1)->get();
    //     return redirect('/payment', ['senders' => $senders]);
    // }

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
        $request->validate([
            'ramburs' => 'required',
            'payment_value' => 'required',
            'autocomplete' => 'required',
            'postal_code' => 'required',
           ]);


        $adress = new Adress();
        $adress->adress = $request->input("autocomplete");
        $adress->zip_code = $request->input("postal_code");
        $adress->type = "payment adress";
        $adress->save();

        // $pay_adr = new paymentAdress();
        // $pay_adr->adress()->associate($adress);
        // $pay_adr->save();

        // $user = Auth::user();

        // $sender = new Sender();
        // $sender = Sender::select('cnp')->where('user_fk_id', Auth::user()->user_id)->get();

        $bill = new paymentBill();
        $bill->user_fk_id = DB::table('users')->where('user_id', Auth::user()->user_id)->value('user_id');
        $bill->adress()->associate($adress);
        $bill->save();

        $payment = new Payment();
        $payment->sum_payment = $request->input("payment_value");
        $payment->payment_by = $request->input("payers");
        $payment->ramburs_value = $request->input("ramburs");
        $payment->ramburs_by = $request->input("ram_payers");
        $payment->bills()->associate($bill);
        $payment->save();

        return redirect('/payment');
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
