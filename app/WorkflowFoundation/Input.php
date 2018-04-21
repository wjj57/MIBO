<?php

namespace App\WorkflowFoundation;

use App\WorkflowFoundation\Shared\Constants\Constant;
use App\WorkflowFoundation\Shared\Memory\Memory;
use App\WorkflowFoundation\Shared\Reflection\Reflection;
use Illuminate\Http\Request;

/**
 * workflow 中的 Input
 *
 * Class Input
 * @package App\WorkflowFoundation
 */
class Input
{

    // 前置操作
    protected function before()
    {
        Memory::set([

            // 记录当前的 workflow 状态为 input
            Constant::WORKFLOW_STATUS => 'input',

            // 存储当前的 workflow 的数据
            Constant::WORKFLOW_INPUT_DATA => app('request')->all()
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

            // 实参数组 ( 调用依赖的方法时需要传递的参数 )
            $actualParameterArr = Reflection::forMethodCreateActualParameterArr($dependence, $method);

            // 执行依赖中的方法
            return (Memory::get($dependence, 'pool'))->$method(...$actualParameterArr);
        }

        // 后置操作
        $this->after();

        return 0;
    }

}