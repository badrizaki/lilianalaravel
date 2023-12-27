<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class AdminAuthType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \User Type  $userType
     * @return mixed
     * on route Route::post('url', 'Controller@method')->middleware('AuthRole:SUP,MKT');
     */
    public function handle($request, Closure $next, $userType)
    {
        $this->Auth = new \Auth();
        $this->Config = new \Config();
        return Redirect::to('/admin');

        return $next($request);
    }
}
