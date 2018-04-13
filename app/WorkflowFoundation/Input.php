<?php

namespace App\WorkflowFoundation;

use Illuminate\Http\Request;
use ReflectionClass;


class Input
{

    // 前置操作
    protected function before()
    {
        Memory::set([

            // 记录当前的 workflow 状态为 input
            'workflow.status' => 'input',

            // 存储当前的 workflow 的数据
            'workflow.input.data' => (new Request())->all()
        ]);
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

        // 循环执行依赖操作
        foreach ($dependences as $dependence => $method) {

            try {

                $class = new ReflectionClass($dependence);
                if (!$class->hasMethod($method)) {

                    return responseJsonOfFailure([], 4444, "在 Input 的依赖中 , $dependence 类不存在 $method 方法 ", 'Input', 500);
                }
            } catch (\Exception $e) {

                return responseJsonOfFailure([], 4444, "在 Input 的依赖中 , $dependence 类不存在", 'Input', 500);
            }

            // 执行依赖中的方法
            return $class->$method();
        }


        // 后置操作
        $this->after();

        return 0;
    }

}