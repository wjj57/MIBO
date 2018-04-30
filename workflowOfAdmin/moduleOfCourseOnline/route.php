<?php

// 配置路由 ( 非法的请求不能请求过来 )
// 因为配置了 throttle中间件 , 所以在1分钟之内 , 所有的 API 只能请求60次


use App\Jobs\TestJob;

$class = workflowOfAdmin\moduleOfCourseOnline\CourseOnlineController::class;

Route::get("", $class . "@");

Route::get("/test", function () {

//    dispatch(new ExecuteScriptJob());
//    \workflowFoundation\Shared\Queues\Jobs\ExecuteScriptJob::dispatch()->onQueue('default');

    dispatch(new TestJob());

    return 'success';
});