<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Receiver;
use App\Adress;
use App\receiverAdress;
use \App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receiver');
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'destination-input' => 'required',
            'postal_code' => 'required',
           ]);

           $adress = new Adress();
           $adress->adress = $request->input("destination-input");
           $adress->zip_code = $request->input("postal_code");
           $adress->type = "delivering adress";
           $adress->save();
   
        //    $user = Auth::user();
        //    $user->adress()->associate($adress);
        //    $user->update();
           
        //    $rec_adr = new receiverAdress();
        //    $rec_adr->adress()->associate($adress);
        //    $rec_adr->save();
   
           $receiver = new Receiver();
           $receiver->name = $request->input("name");
           $receiver->email = $request->input("email");
           $receiver->phone = $request->input("phone");
           $receiver->adress = $request->input("destination-input");
           $receiver->zip_code = $request->input("postal_code");
           $receiver['user_fk_id'] = Auth::user()->user_id;
           $receiver->adress()->associate($adress);
           $receiver->save();
   

        return redirect('/receiver');
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
