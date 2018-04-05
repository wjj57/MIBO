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

    }

    public function handle(array $dependences)
    {
        // 运行前需要先执行的操作
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

        // $this->after();

        return 0 ;
    }



}