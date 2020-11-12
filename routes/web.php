<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::prefix('admin')->group(function() {
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
});

Route::prefix('courier')->group(function() {
    // Route::get('/login', 'AdminController@courier')->name('admin.courier');
    Route::get('/login', 'Auth\CourierLoginController@showLoginForm')->name('courier.login');
    Route::post('/login', 'Auth\CourierLoginController@authenticate')->name('courier.login.submit');
    // Route::post('/login', 'CourierController@store');
    Route::get('/dashcourier', 'CourierController@index')->name('courier.home');
    // Route::post('/dash', 'CourierController@update')->name('update');
    // Route::get('/dash', 'CourierController@index')->name('courier.home');
    Route::post('/update-status', 'CourierController@updateStatus')->name('courier.update.status');
    Route::get('/update-status', function(){
        $packet = DB::table('packages')->orderBy('updated_at', 'DESC')->get();

        return view('/update-status', ['packet' => $packet]);
    });
    
    
});

// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');

// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');


Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
// Route::get('/login/admin', 'Auth\LoginController@index')->name('admin_login');
// Route::get('/register/admin', 'Auth\RegisterController@index')->name('admin_register');

Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/locations', 'LocationsController@index')->name('locations');
Route::get('/customer', 'CustomerController@index')->name('customer.show');
// Route::get('/tracking', 'TrackingController@index')->name('tracking');
Route::get('/tracking', function () {

    $track = DB::table('packages')
    ->join('users', 'packages.user_cnp', '=', 'users.cnp')
    ->where('users.user_id', Auth::user()->user_id)
    ->orderBy('packages.updated_at', 'DESC')->limit(1)->get();
    
    return view('/tracking', ['track' => $track]);
});

Route::post('/sender', 'SenderController@store');
Route::get('/sender', 'SenderController@index')->name('sender');
Route::resource('/sender', 'SenderController');

Route::post('/receiver', 'ReceiverController@store');
Route::get('/receiver', 'ReceiverController@index')->name('receiver');
Route::resource('/receiver', 'ReceiverController');


Route::get('/package', 'PackageController@index')->name('package');
// Route::get('/payment', 'PaymentController@index')->name('payment');

Route::post('/payment', 'PaymentController@store');
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::resource('/payment', 'PaymentController');
Route::get('/payment', function () {

    $bills = DB::table('payment_bills')->orderBy('updated_at', 'DESC')->limit(1)->get();
    $dates = DB::table('bill_data')->orderBy('updated_at', 'DESC')->limit(1)->get();
    
    return view('/payment', ['bills' => $bills], ['dates' => $dates]);
});

// Route::get('/payment', function () {

    // $senders = DB::table('users')->orderBy('updated_at', 'DESC')->limit(1)->get();
    // return view('/payment', ['senders' => $senders]);
    // return view('/payment', );
    // @include('/payment', ['sender' => $sender]);
// });

// Route::get('/payment', 'PaymentController@sender'); 

// Route::get('/payment', function () {

//     $receiver = DB::table('receivers')->orderBy('updated_at', 'DESC')->limit(1)->get();

//     return view('/payment', ['receiver' => $receiver]);
// });

Route::post('/order', 'OrderController@store');
Route::get('/order', 'OrderController@index')->name('order');
Route::resource('/order', 'OrderController');


Route::get('/route', 'RouteController@index')->name('route');
Route::post('/route', 'RouteController@store');
Route::resource('/route', 'RouteController');
Route::get('/route', function () {

    $users = DB::table('adresses')
    ->join('users', 'adresses.adr_code', '=', 'users.adress_code')
    ->where('users.user_id', Auth::user()->user_id)
    ->limit(1)
    ->get();
    
    $receivers = DB::table('bill_data')->orderBy('updated_at', 'DESC')->limit(1)->get();
    
    return view('/route', ['users' => $users], ['receivers' => $receivers]);
});

// Route::post('/card', 'MethodController@postMethod');
// Route::post('/bill', 'MethodController@postMethod');
// Route::get('/bill', 'MethodController@index')->name('billr');
// Route::post('/card', 'MethodController@index')->name('card');
Route::get('/bill', 'MethodController@payment_meth');
Route::get('/card', 'MethodController@payment_meth');
// Route::get('/card', function () {

//     $payms = DB::table('bill_data')
//     ->join('users', 'bill_data.user_fk_id', '=', 'users.user_id')
//     ->where('users.user_id', Auth::user()->user_id)
//     ->limit(1)
//     ->get();
    
//     return view('/card', ['payms' => $payms]);
// });
Route::post('/', 'MethodController@store');
// Route::post('/bill', 'MethodController@store');
// Route::post('/card', 'MethodController@store');
Route::resource('/bill', 'MethodController');
Route::resource('/card', 'MethodController');

Route::post('/bill-card', 'CardController@store');
Route::get('/bill-card', 'CardController@index')->name('bill-card');
Route::resource('/bill-card', 'CardController');

// Route::post('/sender', 'SenderController@update');
// Route::post('/sender', 'SenderController@insert');
// Route::get('/customer', 'CustomerController@showProfile');

// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::view('/home', 'home')->middleware('auth');
// Route::group(['middleware' => 'auth:admin'], function () {
//     Route::view('/admin', 'admin');
// });

// Route::view('/admin', 'admin');

// Route::prefix('admin')->group(function() {
//     Route::get('register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
//     Route::post('register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
//     Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
//     Route::get('/', 'AdminController@index')->name('admin.dashboard');
// });
