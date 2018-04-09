<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:06
 */

namespace App\Workflow;

use Illuminate\Http\Request;
use ReflectionClass;


class Input
{

    protected function before()
    {
        Memory::set([

            'workflow.status' => 'input',
            'workflow.input.data' => (new Request())->all()
        ]);
    }

    protected function after()
    {
        Memory::move('workflow.input.data','workflow.business.data') ;
    }

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