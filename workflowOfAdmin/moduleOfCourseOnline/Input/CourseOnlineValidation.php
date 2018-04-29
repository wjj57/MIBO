<?php

namespace workflowOfAdmin\moduleOfCourseOnline\Input;

use Validator;
use workflowFoundation\Input\BaseValidation;

// 验证
class CourseOnlineValidation extends BaseValidation
{
    /**
      * Filter 的方法
      * ①: 方法访问权限必须为 protected
      * ②: 方法的参数有且只能有 $inputData
      * ③: 返回 Validator(验证器)
      */
    protected function dummyMethod($inputData)
    {
        // 定义验证的错误消息
        $message = [

            'id.required' => '必须有id',
            'id.between' => 'id必须在1到9999之间',
        ];

        // 返回验证器Validator
        return Validator::make($inputData, [

            // 配置你的验证规则
            'id' => 'bail|required|between:1,9999',

        ], $message);
    }


    protected function index($inputData)
    {
        // 定义验证的错误消息
        $message = [

            'id.required' => '必须有id',
            'id.between' => 'id必须在1到9999之间',
        ];

        // 返回验证器Validator
        return Validator::make($inputData, [

            // 配置你的验证规则
            'id' => 'bail|required|between:1,9999',

        ], $message);
    }

}

