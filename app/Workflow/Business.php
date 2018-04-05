<?php

namespace App\Workflow;

use ReflectionClass;


class Business
{

    protected function before()
    {
        Memory::set([

            'workflow.status' => 'business',
            'workflow.business.data' => []
        ]);
    }

    protected function after()
    {
        Memory::move('workflow.business.data', 'workflow.output.data');
    }

    public function handle(array $dependences)
    {
        // 前置操作
        $this->before();

        foreach ($dependences as $dependence => $method) {

            try {

                $class = new ReflectionClass($dependence);
                if (!$class->hasMethod($method)) {

                    return responseJsonOfFailure([], 4444, "在 Business 的依赖中 , $dependence 类不存在 $method 方法 ", 'Business', 500);
                }
            } catch (\Exception $e) {

                return responseJsonOfFailure([], 4444, "在 Business 的依赖中 , $dependence 类不存在", 'Business', 500);
            }

            // 执行依赖中的方法
            return $class->$method();
        }

        // 后置操作
        $this->after();

        return 0;
    }


}