<?php

namespace App\Workflow;

use ReflectionClass;
use ReflectionMethod;


class Business
{

    // 前置操作
    protected function before()
    {
        Memory::set([
            'workflow.status' => 'business',
        ]);

        Memory::move('workflow.input.data','workflow.business.data') ;
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

        // 循环传来的依赖数组( 依赖名 => 方法名 )
        foreach ($dependences as $dependence => $method) {

            // 实参数组 ( 调用依赖的方法时需要传递的参数 )
            $actualParameterArr = [];
            foreach ((new ReflectionMethod($dependence, $method))->getParameters() as $parameter) {

                // 依次获取此方法的参数类型
                if (is_null($type = $parameter->getType()) && $parameter->getName() === 'businessData') {

                    $actualParameterArr[] = Memory::get('workflow.business.data');
                    continue;
                }
                if (is_null($type)) {
                    continue;
                }
                $type = strval($type);
                $actualParameterArr[] = new $type();
            }

            // 执行依赖中的方法
            return call_user_func($dependence . '::' . $method, ...$actualParameterArr);
        }

        // 后置操作
        $this->after();

        return 0;
    }


}