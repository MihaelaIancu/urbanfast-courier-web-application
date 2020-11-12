<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sender;
use App\Adress;
use App\senderAdress;
use \App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sender');
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
            'cnp' => 'required',
            'phone' => 'required',
            'origin-input' => 'required',
            'postal_code' => 'required',
           ]);


        $adress = new Adress();
        $adress->adress = $request->input("origin-input");
        $adress->zip_code = $request->input("postal_code");
        $adress->type = "shipping adress";
        $adress->save();

        $user = Auth::user();
        $user->cnp = $request->input("cnp");
        $user->phone = $request->input("phone");
        $user->adress()->associate($adress);
        $user->update();
        
        // $send_adr = new senderAdress();
        // $send_adr->adress()->associate($adress);
        // $send_adr->save();

        // $sender = new Sender();
        // $sender->cnp = $request->input("cnp");
        // $sender->phone = $request->input("phone");
        // $sender['user_fk_id'] = Auth::user()->user_id;
        // $sender->adress()->associate($send_adr);

        // Sender::firstOrCreate([
        //     'cnp' => (string) $cnp,
        // ])->update([
        //     'phone' => $phone,
        //     'user_fk_id' => Auth::user()->user_id,
        //     'date_published' => $datePublished
        // ]);

        // $checker = Sender::where('cnp',$sender->cnp)->first();
        // if(isset($checker->cnp) && isset($sender->cnp)){

        //     $sender->update($request->all());
        // }
        // else {
        //     $sender->save($request->all());
        // }

        return redirect('/sender');
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

    public function insert(Request $request){
    }

}
