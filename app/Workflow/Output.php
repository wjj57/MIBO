<?php

namespace App\Workflow;


use ReflectionClass;

class Output
{

    protected function before()
    {
        Memory::set([

            'workflow.status' => 'output',
            'workflow.output.data' => Memory::pull('workflow.business.data')
        ]);
    }

    protected function after()
    {

        return responseJsonOfSuccess(

            Memory::get('workflow.output.data'),
            0,
            '成功',
            'Output',
            200
        );
    }

    public function handle(array $dependences)
    {
        // 运行前需要先执行的操作
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

        return $this->after();
    }


}