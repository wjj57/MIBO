<?php


namespace App\WorkflowFoundation\Output\Filters;


use App\Workflow\Memory;

class BaseFilter
{

    protected static $outputData;

    protected function before()
    {
        Memory::set('workflow.status', 'filter');

        if (is_null(self::$outputData)) {

            self::$outputData = Memory::get('workflow.output.data');
        }
    }

    protected function after()
    {
        Memory::set('workflow.output.data', self::$outputData);
        unset(self::$outputData);
    }


    function __construct()
    {
        $this->before();
    }


    // 只过滤时间
    protected function onlyFilterTime()
    {


    }

}