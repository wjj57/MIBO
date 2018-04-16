<?php


namespace App\Workflow\Business\Directors;


use App\Workflow\Business\Directors\Services\CourseOnlineService;

class CourseOnlineDirector
{


    protected function index($inputData, CourseOnlineService $courseOnlineService)
    {
        // 定义业务数据
        $business = [];

        // 勾住index方法 , 在index方法执行前先执行这个回调函数
        // 并且这个回调函数的返回值决定了
        $courseOnlineService->hook('index', function () {

            // 返回 true 则可以继续 , 返回 false, 则不再向下执行
            // return true/false ;
        },false);

        $business = $courseOnlineService->run('index');


        // 返回业务数据
        return $business;
    }
}