<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdmin
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
        // return $next($request);
        // echo "<pre>";
        // print_r(Auth::user()->role_id);
        // exit;

        if(auth::check() && Auth::user()->role_id == 1){
            
           return $next($request);
         }
         else {
            return redirect('abc');
         }


      
// {
//     return auth::user( )->role_id <= 2
//         ? $next($request)
//         : redirect('/abc');
// }
        
    }
}
