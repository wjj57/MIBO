<?php

namespace App\WorkflowFoundation;

use ReflectionMethod;

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
            'workflow.status' => 'business',
        ]);

        // Business 中的数据分为2部分 : portionOfInput + portionOfService
        // portionOfInput : Input中的数据 , 之所以存这个数据 , 是因为 Director 等 Business 中的依赖有时候都需要 Input 数据
        // portionOfService : Business中真正的业务数据 。
        // 把 workflow.input.data 中的数据移到 workflow.business.data.portionOfInput 中 ,
        // 并将 workflow.business.data.portionOfService 置为空
        Memory::move('workflow.input.data', 'workflow.business.data.portionOfInput');
        Memory::set('workflow.business.data.portionOfService', null);
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

        // 循环执行传来的依赖操作( 依赖名 => 方法名 )
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