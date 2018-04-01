<?php

namespace App\Workflow;


class Output
{


    protected function before()
    {
        MemoryFragmentation::set('workflow.status','output');

        MemoryFragmentation::set('workflow.output.data', MemoryFragmentation::pull('workflow.business.data'));
    }

    public function handle(array $dependences)
    {
        // 运行前需要先执行的操作
        $this->before();

        foreach ($dependences as $dependence => $method) {

            new $dependence() -> $method();
        }

        return $this->after();
    }

    protected function after()
    {

        return json_encode(MemoryFragmentation::get('workflow.output.data'), 0);
    }


}