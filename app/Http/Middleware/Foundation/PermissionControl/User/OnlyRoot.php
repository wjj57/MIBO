<?php

namespace App\Http\Middleware\Foundation\PermissionControl\User;

use Closure;


// 权限控制 - 只有 Root 用户才有权限
class OnlyRoot
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
        // 根据当前传来的请求参数 , 判断用户是否是 Root 用户
        // 只有是Root用户 , 才能继续向下运行

        return $next($request);
    }

}