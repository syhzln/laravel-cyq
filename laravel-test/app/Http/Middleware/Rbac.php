<?php

namespace App\Http\Middleware;

use App\AdminUser;
use App\User;
use Closure;
use Illuminate\Support\Facades\Route;


class Rbac
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
        $route = Route::current()->uri();
        $user = AdminUser::find(session('a'));
            if (!$user->can($route)){
                return back();
            }
        return $next($request);
    }
}
