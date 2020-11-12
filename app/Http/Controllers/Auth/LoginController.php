<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $username = 'username';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function username(){
    //     return 'username';
    // }
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     // $this->middleware('guest:admin')->except('logout');
    // }

    // public function showAdminLoginForm()
    // {
    //     // return view('auth.login', ['url' => 'admin']);
    //     // return view('auth.login', [
    //     //     'url' => Config::get('constants.guards.admin')
    //     // ]);
    // }

    // protected function validator(Request $request)
    // {
    //     return $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);
    // }

    // protected function guardLogin(Request $request, $guard)
    // {
    //     $this->validator($request);

    //     return Auth::guard($guard)->attempt(
    //         [
    //             'email' => $request->email,
    //             'password' => $request->password
    //         ],
    //         $request->get('remember')
    //     );
    // }

    // public function adminLogin(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'email'   => 'required|email',
    //     //     'password' => 'required|min:6'
    //     // ]);

    //     // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //     //     return redirect()->intended('/admin');
    //     //     // return redirect('/admin')->withCookie(Cookie::forget('cookie_name'));
    //     // }

    //     // if ($this->guardLogin($request, Config::get('constants.guards.admin'))) {
    //     //     return redirect()->intended('/admin');
    //     // }

    //     return back()->withInput($request->only('email', 'remember'));
    // }
}
