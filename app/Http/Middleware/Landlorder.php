<?php

namespace App\Http\Middleware;

use Closure;

use Landlord;

class Landlorder
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
        if ($request->user() && $request->user()->school) Landlord::addTenant($request->user()->school);

        return $next($request);
    }
}
