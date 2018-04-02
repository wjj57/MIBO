<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:07
 */

namespace App\Workflow;


class Business
{

    protected function before()
    {
        Memory::set('workflow.status', 'business');
        Memory::set('workflow.business.data', null);
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