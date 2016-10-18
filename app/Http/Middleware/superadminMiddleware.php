<?php

namespace App\Http\Middleware;

use Closure;

class superadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if(\Auth::check()){
//            return $next($request);
//        }
//        else{
//            return redirect()->to('/login');
//        }
        
        if(\Auth::user()->role_id == 1){
            return $next($request);
        }
        else{
            return abort(403);
        }
        
    }
}
