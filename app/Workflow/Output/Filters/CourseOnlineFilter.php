<?php


namespace App\Workflow\Output\Filters;

use App\WorkflowFoundation\Output\Filters\BaseFilter;


class CourseOnlineFilter extends BaseFilter
{

    protected function index($outputData)
    {

        $outputData['name'] = 'Lvsi';

        return $outputData;
    }
}