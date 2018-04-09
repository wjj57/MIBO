<?php

namespace App\Workflow\Business\Managers;

use App\Workflow\Memory;


class CourseOnlineManager extends BaseManager
{

    public function pay()
    {
        Memory::set('workflow.business.data', $res);
    }

}
