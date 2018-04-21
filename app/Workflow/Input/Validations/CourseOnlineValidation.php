<?php

namespace App\Workflow\Input\Validations;

use App\WorkflowFoundation\Input\Validations\BaseValidation;
use Illuminate\Http\Request;
use Validator;


class CourseOnlineValidation extends BaseValidation
{

    // 验证方法的访问权限必须 < public
    // 返回验证器Validator
    protected function index($inputData)
    {
        $message = [

            'name.required' => 'name参数为必填项',
            'name.numeric' => 18726
        ];
        return Validator::make($inputData, [

            'name' => 'bail|required|numeric',

        ], $message);
    }

}

