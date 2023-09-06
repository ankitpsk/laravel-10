<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyIndianAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $isValidIP = false; // function to check IP Address

        if(!$isValidIP){
            return redirect('/'); // Otherwise, redirect back to the home page
        }

        return $next($request);
    }
}
