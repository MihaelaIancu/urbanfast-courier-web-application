<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CourierLoginController extends Controller
{
        /**
         * Show the application’s login form.
         *
         * @return \Illuminate\Http\Response
         */

        public function showLoginForm()
        {
            return view('auth.courier-login');
        }

        protected function guard(){
            return Auth::guard('courier');
        }
        
        use AuthenticatesUsers;
        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = '/courier/dashcourier';
        protected $username = 'username';
        /**
         * Create a new controller instance.
         *
         * @return void
         */

         protected function validator(Request $request)
        {
            return $this->validate($request, [
                'username' => 'required',
                'password' => 'required|min:6'
            ]);
         }

        public function authenticate(Request $request)
        {
            $credentials = $request->only('username', 'password');
            $this->validator($request);
    
            // if (Auth::attempt($credentials)) {
            if (Auth::guard('courier')->attempt($credentials)){
                // Authentication passed...
                return redirect()->route('courier.home');
            }
        }
        // public function courierLogin(Request $request){
        //     $this->validate($request, [
        //         'password' => 'required|min:6'
        //     ]);

        //     if (Auth::guard('courier')->attempt(['password' => $request->password], $request->get('remember'))) {
        //         return redirect('/courier/dashcourier');
        //     }
        //     else
        //     {
        //     return redirect('/admin/dashboard')->with('message', 'Invalid Access Credentials');
        //     }
        // }
        public function __construct()
        {
            $this->middleware('guest:courier')->except('logout');
        }
}
