<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:06
 */

namespace App\Workflow;


class Input
{

    protected function before()
    {
        Memory::set('workflow.status', 'input');
        Memory::set('workflow.input.data', (new Request())->all());
    }

    protected function after()
    {


    }

    public function handle(array $dependences)
    {
        // 运行前需要先执行的操作
        $this->before();

        // 循环执行依赖操作
        foreach ($dependences as $dependence => $method) {

            // 之所以使用两种方法调用 , 是为了保证最大程度的可用度 , 不能因为是个静态方法就不能被调用了

            // 先判断是否是静态方法 , 如果是静态方法则静态调用
            $dependence::method() ;

            // 如果不是静态方法 , 则生成对象并调用此方法
            new $dependence() -> $method();
        }

        $this->after();
    }

}