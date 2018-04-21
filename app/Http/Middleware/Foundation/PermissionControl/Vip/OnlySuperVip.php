<?php

namespace App\Http\Middleware\Foundation\PermissionControl\Vip;

use Closure;

// 权限控制 - 只有 超级Vip 才有权限
class OnlySuperVip
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
        // 根据当前传来的请求参数 , 判断用户是否是 超级Vip
        // 只有是超级Vip , 才能继续向下运行

        return $next($request);
    }

}