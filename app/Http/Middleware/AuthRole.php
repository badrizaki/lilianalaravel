<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \Role  $roles
     * @return mixed
     * on route Route::post('url', 'Controller@method')->middleware('AuthRole:SUP,MKT');
     */
    public function handle($request, Closure $next)
    {
        $whiteList = \Config::get('menu.whiteList', []);
        $roleName = \Route::currentRouteName();
        $roleName = str_replace('.index', '-list', $roleName);
        $roleName = str_replace('.list', '-list', $roleName);
        $roleName = str_replace('.destroy', '-delete', $roleName);
        $roleName = str_replace('.delete', '-delete', $roleName);
        $roleName = str_replace('.show', '-list', $roleName);
        $roleName = str_replace('.add', '-create', $roleName);
        $roleName = str_replace('.store', '-create', $roleName);
        $roleName = str_replace('.upload.excel', '-create', $roleName);
        $roleName = str_replace('.create', '-create', $roleName);
        $roleName = str_replace('.update', '-edit', $roleName);
        $roleName = str_replace('.edit', '-edit', $roleName);
        $roleName = str_replace('.order', '-edit', $roleName);
        if ($roleName == "" || in_array($roleName, $whiteList))
        {
            return $next($request);
        }

        if (\Auth::user()->can($roleName)) {
            return $next($request);
        } else {
            return Redirect::to('/admin/access-denied');
        }

        return $next($request);
    }
}