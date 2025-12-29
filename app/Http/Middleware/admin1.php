<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin1
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ( $role === 'admin1' ) {
            return redirect('/admin1');
        }

        else {
            return redirect('/404');
        }


        return $next($request);
    }
}
