<?php

namespace App\WorkflowFoundation;

use App\WorkflowFoundation\Shared\Constants\Constant;
use App\WorkflowFoundation\Shared\Memory\Memory;
use App\WorkflowFoundation\Shared\Reflection\Reflection;

/**
 * workflow 中的 Output
 *
 * Class Output
 * @package App\WorkflowFoundation
 */
class Output
{

    // 前置操作
    protected function before()
    {
        // 记录当前的 workflow 状态为 output
        Memory::set([

            Constant::WORKFLOW_STATUS => 'output',
        ]);

        // 把 workflow.business.data 中的数据移到 workflow.output.data 中 ,
        Memory::move(Constant::WORKFLOW_BUSINESS_DATA, Constant::WORKFLOW_OUTPUT_DATA);
    }

    // 后置操作
    protected function after()
    {

    }

    // 处理
    public function handle(array $dependences)
    {
        // 前置操作
        $this->before();

        // 循环执行传来的依赖数组中的操作( [类名 => 方法名] )
        foreach ($dependences as $dependence => $method) {

            // 实参数组 ( 调用类的方法时需要传递的参数 )
            $actualParameterArr = Reflection::forMethodCreateActualParameterArr($dependence, $method);

            // 执行依赖中的方法
            return (Memory::get($dependence, 'pool'))->$method(...$actualParameterArr);
        }

        // 后置操作
        $this->after();

        // 成功响应
        return responseJsonOfSuccess(

            Memory::get(Constant::WORKFLOW_OUTPUT_DATA),
            0,
            '成功',
            'output',
            200
        );
    }


}