<?php

namespace App\Workflow\Managers;

use App\Workflow\Business\Managers\BaseManager;
use App\Workflow\Business\Managers\Logics\CourseOnlineLogic;
use App\Workflow\Memory;


class CourseOnlineManager extends BaseManager
{

    public function pay()
    {
        // step 1 : 是否可以购买
        CourseOnlineLogic::analyze('pay', 1, ['name' => 'lvsi', 'money' => 9999]);

        // step 2 : 购买并支付
        CourseOnlineLogic::analyze('pay', 2, ['ss' => 'ss']);

        // step 3 : 完成减少
        CourseOnlineLogic::analyze('pay', 3, ['age' => 12]);



        Memory::set('workflow.business.data', $res);
    }

}
