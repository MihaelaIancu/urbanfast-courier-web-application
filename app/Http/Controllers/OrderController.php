<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sender;
use DB;
use App\Package;
use App\billData;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order');
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
        $request->validate([
            'height' => 'required',
            'width' => 'required',
            'length' => 'required',
            'weigth' => 'required',
            'content' => 'required',
           ]);

        $user = Auth::user();

        // $sender = new Sender();
        // $sender = Sender::select('cnp')->where('user_fk_id', Auth::user()->user_id)->get();

        $package = new Package();
        $package->height = $request->input("height");
        $package->width = $request->input("width");
        $package->length = $request->input("length");
        $package->weigth_kg = $request->input("weigth");
        $package->content = $request->input("content");
        $package->details = $request->input("details");
        $package->user_cnp = DB::table('users')->where('user_id', Auth::user()->user_id)->value('cnp');
        // $package->sender()->associate($sender);
        $package->save();

        // $user = Auth::user();
        // $user->adress()->associate($adress);
        // $user->update();
        
        // $send_adr = new senderAdress();
        // $send_adr->adress()->associate($adress);
        // $send_adr->save();

        // $sender = new Sender();
        // $sender->cnp = $request->input("cnp");
        // $sender->phone = $request->input("phone");
        // $sender['user_fk_id'] = Auth::user()->user_id;
        // $sender->adress()->associate($send_adr);
        // $sender->save();

        return redirect('/order');
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
