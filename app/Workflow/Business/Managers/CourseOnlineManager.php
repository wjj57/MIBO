<?php

namespace App\Workflow\Managers;

use App\Workflow\Business\Managers\BaseManager;
use App\Workflow\Business\Managers\Logics\CourseOnlineLogic;
use App\Workflow\Memory;


class CourseOnlineManager extends BaseManager
{

    public function pay()
    {
        $res = CourseOnlineLogic::analyze('pay', 1, ['name' => 'lvsi', 'money' => 9999]);
        Memory::set('workflow.business.data', $res);
    }

}
