<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;

class CheckCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $countryCode)
    {
        $ip = $request->ip();


        if ($ip === '127.0.0.1') {
            return $next($request);
        }
        
        $position = Location::get($ip);

        if (!$position || $position->countryCode !== $countryCode) {
            abort(403);
        }

        return $next($request);
    }
}