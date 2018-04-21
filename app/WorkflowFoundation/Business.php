<?php

namespace App\WorkflowFoundation;

use App\WorkflowFoundation\Shared\Constants\Constant;
use App\WorkflowFoundation\Shared\Memory\Memory;
use App\WorkflowFoundation\Shared\Reflection\Reflection;


/**
 * workflow 中的 Business
 *
 * Class Business
 * @package App\WorkflowFoundation
 */
class Business
{
    // 前置操作
    protected function before()
    {
        Memory::set([

            // 记录当前的 workflow 状态为 Business
            Constant::WORKFLOW_STATUS => 'business',

            // 设置 workflow.business.data 数据
            Constant::WORKFLOW_BUSINESS_DATA => null
        ]);
    }

    // 后置操作
    protected function after()
    {

    }

    // 处理
    public function handle(array $dependencies)
    {
        // 前置操作
        $this->before();

        // 循环执行传来的依赖数组中的操作( [类名 => 方法名] )
        foreach ($dependencies as $dependence => $method) {

            // 实参数组 ( 调用类的方法时需要传递的参数 )
            $actualParameterArr = Reflection::forMethodCreateActualParameterArr($dependence, $method);

            // 执行依赖中的方法
            return (Memory::get($dependence, 'pool'))->$method(...$actualParameterArr);
        }

        // 后置操作
        $this->after();

        return 0;
    }


}