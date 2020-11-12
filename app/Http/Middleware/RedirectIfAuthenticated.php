<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }


        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
        // elseif ($guard == "admin" && Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }

        // switch ($guard) {
        //     case 'admin':
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('admin.dashboard');
        //         }
        //         break;

        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::HOME);
        //         }
        //         break;
        // }

        switch ($guard) {
            case 'admin' :
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;

            case 'courier' :
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('courier.home');
                    // return redirect('/courier/dashcourier');
                    // return redirect('/courier/dashcourier');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }
     return $next($request);

        // return $next($request);
    }
}
