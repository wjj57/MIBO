<?php

namespace App\Http\Middleware\Custom;

use Closure;

class CURDAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {



        return $next($request);
    }
}
