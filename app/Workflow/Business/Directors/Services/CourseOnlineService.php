<?php


namespace App\Workflow\Business\Directors\Services;

use App\WorkflowFoundation\Business\Directors\BaseService;


class CourseOnlineService extends BaseService
{

    public function buy()
    {

        return '购买成功' ;
    }

    public function pay()
    {
        return '支付成功';
    }
}