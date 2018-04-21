<?php

namespace App\Http\Middleware\Foundation\PermissionControl\User;

use Closure;

// 权限控制 - 只有在登录状态下才有权限
class OnlyLogin
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
        // 根据当前传来的请求参数 , 判断用户是否已登录
        // 只有在登录情况下 , 才能继续向下运行

        return $next($request);
    }

}