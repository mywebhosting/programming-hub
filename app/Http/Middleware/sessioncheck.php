<?php

namespace App\Http\Middleware;

use Closure;

class sessioncheck
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
        if(empty(session('admin_id')))
            // return view('AdminView/login');
            return redirect('/super-admin');
        else
            // return redirect('/super-admin/dashboard');
            return $next($request);
    }
}
