<?php


namespace App\WorkflowFoundation\Output\Filters;

use App\WorkflowFoundation\Memory;

class BaseFilter
{
    // 当前 Output 中的数据
    protected static $outputData;

    // 前置操作
    protected function before()
    {
        // 设置当前的状态为 filter , 并未 outputData 数据成员赋值
        Memory::set('workflow.status', 'filter');
        if (is_null(self::$outputData)) {

            // 从 Memory 中获取当前 Output 中的数据
            self::$outputData = Memory::get('workflow.output.data');
        }
    }

    // 后置操作
    protected function after()
    {
        // 更新 workflow.output.data 中的数据 , 并销毁 $outputData 数据成员
        Memory::update('workflow.output.data', self::$outputData);
        unset(self::$outputData);
    }

    function __construct()
    {
        $this->before();
    }

}