<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Config;

class AuthLoginQRCode
{
    public function handle($request, Closure $next)
    {
        if (false === $request->session()->get('isLogin', false))
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}