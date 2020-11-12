<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view('/customer');
    }

    public function showProfile()
    {
        // $userId = $id ?: auth()->user()->user_id;
        // $user = User::with('profile')->findOrFail($userId);
        // return view('/customer.profile.show',compact('userData'));
        // return view('customer.profile', ['user' => User::findOrFail($id)]);
        // $user =  DB::table("users")->where("id", Auth::user()->user_id)->get();
        // return view('/customer',compact('user'));
    }

    // public function insert(Request $request){
    //     $cnp = $request->input('cnp');
    //     $phone = $request->input('phone');
    //     $adress= $request->input('adress');
    //     $zip = $request->input('zip_code');
    //     $data1=array('cnp'=>$cnp,"phone"=>$phone);
    //     $data2=array('adress'=>$adress,"zip_code"=>$zip);
    //     DB::table('senders')->insert($data1);
    //     DB::table('adresses')->insert($data2);
    // }
}
