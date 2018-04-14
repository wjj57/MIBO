<?php

namespace App\WorkflowFoundation;

use ReflectionClass;

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

            'workflow.status' => 'output',
        ]);

        // 把 workflow.business.data.portionOfService 中的数据移到 workflow.output.data 中 ,
        // 并且销毁掉 workflow.business.data.portionOfInput
        Memory::move('workflow.business.data.portionOfService', 'workflow.output.data');
        Memory::destroy('workflow.business.data.portionOfInput');
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

        foreach ($dependences as $dependence => $method) {

            try {

                $class = new ReflectionClass($dependence);
                if (!$class->hasMethod($method)) {

                    return responseJsonOfFailure([], 4444, "在 Output 的依赖中 , $dependence 类不存在 $method 方法 ", 'Output', 500);
                }
            } catch (\Exception $e) {

                return responseJsonOfFailure([], 4444, "在 Output 的依赖中 , $dependence 类不存在", 'Output', 500);
            }

            // 执行依赖中的方法
            return $class->$method();
        }

        // 后置操作
        $this->after();

        // 成功响应
        return responseJsonOfSuccess(

            Memory::get('workflow.output.data'),
            0,
            '成功',
            'output',
            200
        );
    }


}