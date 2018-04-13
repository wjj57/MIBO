<?php

namespace App\WorkflowFoundation\Input\Validations;

use App\WorkflowFoundation\Memory;

class BaseValidation
{
    // 当前 Input 中的数据
    protected static $inputData = null;

    // 前置操作
    protected function before()
    {
        // 设置当前的状态为 validation , 并未 inputData 数据成员赋值
        Memory::set('workflow.status', 'validation');
        if (is_null(self::$inputData)) {

            // 从 Memory 中获取当前 Input 中的数据
            self::$inputData = Memory::get('workflow.input.data');
        }
    }

    // 后置操作
    protected function after()
    {
        // 此 Validation 已结束 , 销毁掉 $inputData
        unset(self::$inputData);
    }

    function __construct()
    {
        $this->before();
    }


    // 未通过验证时就会发出异常
    protected function failedWillEmitException($validator)
    {

        // 未通过验证
        if($validator->fails()){

            // 未通过验证 , 则直接返回JSON并提示错误
            return responseJsonOfFailure([],4444,'','validation') ;
        }

        return 0;
    }


}