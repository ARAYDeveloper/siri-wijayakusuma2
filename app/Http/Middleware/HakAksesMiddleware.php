<?php

namespace App\Http\Middleware;

use Closure;

class HakAksesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $namaRule)
    {
        $roles = explode('|',$namaRule);
        $can = false;
        foreach ($roles as $role) {
            if (auth()->check() && auth()->user()->punyarule($role)){
                $can = true;
            }
        }
        if (!$can){
            return redirect(route('login.index'));

        }
        return $next($request);
    }
}
