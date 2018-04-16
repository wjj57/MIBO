<?php

namespace App\WorkflowFoundation\Input\Validations;

use App\WorkflowFoundation\Shared\Constants\Constant;
use App\WorkflowFoundation\Shared\Memory\Memory;

/**
 * 验证基类
 *
 * Class BaseValidation
 * @package App\WorkflowFoundation\Input\Validations
 */
class BaseValidation
{
    // 前置操作
    protected function before()
    {
        // 设置当前的状态为 validation , 并未 inputData 数据成员赋值
        Memory::set(Constant::WORKFLOW_STATUS, 'validation');
    }

    // 后置操作
    protected function after()
    {
    }

    // 开始验证
    protected function startValidate($validator)
    {
        // 未通过验证
        if ($validator->fails()) {

            // 未通过验证 , 则直接返回JSON并提示错误
            return responseJsonOfFailure([], 4444, '', 'validation');
        }

        return 0;
    }

    public function __call($method, $arguments)
    {
        // 方法如果不存在则报错给客户端
        if (!method_exists($this, $method)) {

            return responseJsonOfSystemError([], 4444, '当前的 Validation 不存在' . $method . '方法', 'validation');
        }

        // 前置操作
        $this->before();

        // 开始验证
        $this->startValidate($this->$method(...$arguments));

        // 验证结束并且已经通过验证
        // 调用后置操作
        $this->after();

        return 0;
    }

}


