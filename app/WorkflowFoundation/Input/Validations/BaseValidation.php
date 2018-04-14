<?php

namespace App\WorkflowFoundation\Input\Validations;

use App\WorkflowFoundation\Memory;

/**
 * 验证基类
 *
 * Class BaseValidation
 * @package App\WorkflowFoundation\Input\Validations
 */
class BaseValidation
{
    // 存储当前 Input 中的数据
    protected static $inputData = null;

    // 前置操作
    protected function before()
    {
        // 设置当前的状态为 validation , 并未 inputData 数据成员赋值
        Memory::set('workflow.status', 'validation');
        self::$inputData = (!is_null(self::$inputData)) ?: Memory::get('workflow.input.data');
    }

    // 后置操作
    protected function after()
    {
        // 此 Validation 已结束 , 销毁掉 $inputData 占用的资源
        unset(self::$inputData);
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

    public function __call($name, $arguments)
    {
        // 方法如果不存在则报错给客户端
        if (!method_exists($this, $name)) {

            return responseJsonOfSystemError([], 4444, '当前的 Validation 不存在' . $name . '方法', 'validation');
        }

        // 前置操作
        $this->before();

        $this->startValidate( $this->$name() );

        // 验证结束并且已经通过验证
        // 调用后置操作
        $this->after();

        return 0;
    }

}