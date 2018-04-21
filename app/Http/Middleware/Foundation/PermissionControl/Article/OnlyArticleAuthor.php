<?php


namespace App\Http\Middleware\Foundation\PermissionControl\Article;

use Closure;



// 权限控制 - 只有文章的作者才有权限
class OnlyArticleAuthor
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
        // 根据当前传来的请求参数 , 判断用户是否是 文章的作者
        // 只有是文章的作者 , 才能继续向下运行

        return $next($request);
    }

}



