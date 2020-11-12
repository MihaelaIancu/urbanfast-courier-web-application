<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;
use App\Package;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CourierController extends Controller
{
    
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:courier');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcel = DB::table('packages')->orderBy('updated_at', 'DESC')->get();

        return view('/dashcourier', ['parcel' => $parcel]);
        // return view('dashcourier');
    }
    // public function courier()
    // {
    //     return view('courier_dashboard');
    // }

    public function store(Request $request){
    
    $courier = new Courier();
    $courier['id_admin'] = Auth::admin()->admin_id;
    $courier->update();

    return redirect('/courier/dashcourier');
    }

    // public function update(Request $request){
    
        // $value = $request->input('status_cgs[{{$data->pack_code}}]');
        // dd($request->input('status_cgs[{{$data->pack_code}}]'));
        // $id = DB::table('packages')->select('pack_code')->get();
       
        // DB::table('packages')
        // // ->where('status', 'processed')
        // ->update(['status'=> 'processed']);
        
        // $sql = "UPDATE packages SET status = ? WHERE pack_code = $request->pack_code";
        // DB::update($sql, array($value));
        // $packet = DB::table('packages')->orderBy('updated_at', 'DESC')->get();
        
        // return redirect('/dash', ['packet' => $packet]);
        // return redirect('/courier/dash');
    // }

    public function updatestatus(Request $request)
    {
        DB::table('packages')
        ->where('pack_code', $request->id)
        ->update(['status'=> $request->value]);
        // dd($request->all());
        return redirect('/courier/update-status');
    }
}
