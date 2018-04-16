<?php


namespace App\Workflow\Business\Directors;


use App\Workflow\Business\Directors\Services\CourseOnlineService;

class CourseOnlineDirector
{


    protected function index($inputData, CourseOnlineService $courseOnlineService)
    {
        // 定义业务数据
        $business = [] ;

        $courseOnlineService->index();

        // 返回业务数据
        return $business;
    }
}