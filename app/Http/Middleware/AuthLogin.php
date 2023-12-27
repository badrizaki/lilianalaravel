<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Config;

class AuthLogin
{
    public function handle($request, Closure $next, $status = 'notLogin')
    {
        if (false === $request->session()->get('isLogin', false) && $status == 'notLogin')
        {
            return redirect()->route('login');
        }
        if (true === $request->session()->get('isLogin') && $status == 'login')
        {
            return redirect()->route('admin');
        }
        return $next($request);
    }
}