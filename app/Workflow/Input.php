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

    public function handle(array $dependences)
    {
        // 运行前需要先执行的操作
        $this->before();

        foreach ($dependences as $dependence => $method) {

            new $dependence() -> $method();
        }

        $this->after();
    }

    protected function after()
    {


    }
}