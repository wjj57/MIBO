<?php


namespace App\WorkflowFoundation\Output\Filters;

use App\WorkflowFoundation\Memory;

class BaseFilter
{
    // 存储当前 Output 中的数据
    protected static $outputData;

    // 前置操作
    protected function before()
    {
        // 设置当前的状态为 filter , 并未 outputData 数据成员赋值
        Memory::set('workflow.status', 'filter');
        self::$outputData = (!is_null(self::$outputData)) ?: Memory::get('workflow.output.data');
    }

    // 后置操作
    protected function after()
    {
        // 更新 workflow.output.data 中的数据 , 并销毁 $outputData 占用的资源
        Memory::update('workflow.output.data', self::$outputData);
        unset(self::$outputData);
    }


    public function __call($name, $arguments)
    {
        // 方法如果不存在则报错给客户端
        if (!method_exists($this, $name)) {

            return responseJsonOfSystemError([], 4444, '当前的 Filter 不存在' . $name . '方法', 'filter');
        }

        // 调用前置操作
        $this->before();



        // 过滤结束 , 调用后置操作
        $this->after();

        return 0;
    }

}