<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Courier;
use App\Package;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $q = DB::table('users')->where('users.user_id', Auth::user()->user_id)->limit(1)->value('cnp');
        $history = DB::table('packages')
        // ->select(DB::table('users')->where('users.user_id', Auth::user()->user_id)->value('cnp'))
        // ->join('users', 'packages.user_cnp', '=', 'users.cnp')
        // ->where(function($query){
        //     $query = User::select('cnp')->where('users.user_id', Auth::user()->user_id)->limit(1);
        // }, 'user_cnp')
        ->where('user_cnp', $q)
        ->orderBy('updated_at', 'DESC')->get();

        return view('/history', ['history' => $history]);
    }
}
