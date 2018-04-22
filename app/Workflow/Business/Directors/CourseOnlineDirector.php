<?php

namespace App\Workflow\Business\Directors;

use App\Exceptions\ServiceException;
use App\Workflow\Business\Directors\Services\CourseOnlineService;
use App\WorkflowFoundation\Business\Directors\BaseDirector;
use App\WorkflowFoundation\Business\Directors\Services\User\UserService;


class CourseOnlineDirector extends BaseDirector
{


    protected function buy($inputData, CourseOnlineService $courseOnlineService, UserService $userService)
    {
        // 定义业务数据
        $business = [];


        try {

            $user = $userService->get('users', ['id' => $inputData['id']]);

            $res = $courseOnlineService->hookOnBeforeAndRunMethodImmediately('buy', [], function () use ($user) {

                // 只有 lvsi 才能购买
                if ($user['name'] !== 'lvsi') {

                    throw new ServiceException('只有lvsi才可以购买');
                }
                return true;
            });

            $res2 = $courseOnlineService->hookOnBeforeAndRunMethodImmediately('pay', [], function () use ($user) {

                // 只有余额 >= 1000 时才能支付
                if ($user['money'] < 1000) {

                    throw new ServiceException('抱歉,您的余额<1000,无法支付');
                }
                return true;
            });

        } catch (ServiceException $e) {

            return responseJsonOfFailure([], true, $e->getMessage());
        }

        // 返回业务数据
        return $business;
    }
}