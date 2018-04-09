<?php

namespace App\Workflow\Business\Managers;

use App\Workflow\Memory;
use App\WorkflowFoundation\Business\Managers\BaseManager;


class CourseOnlineManager extends BaseManager
{

    public function index()
    {


    }

    public function pay()
    {
        Memory::set('workflow.business.data', $res);
    }

}
