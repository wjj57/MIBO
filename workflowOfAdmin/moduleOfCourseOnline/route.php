<?php

// 配置路由 ( 非法的请求不能请求过来 )

$class = workflowOfAdmin\moduleOfCourseOnline\CourseOnlineController::class;

Route::get("/courseOnline/index", $class . "@index");

