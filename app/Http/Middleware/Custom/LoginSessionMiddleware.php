<?php

namespace App\Http\Middleware;

use Closure;

class LoginSessionMiddleware
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

        // 判断是否有登录状态 , 没有的话 , 则抛出异常


        return $next($request);
    }
}
