<?php

namespace App\Workflow\Input\Validations;

use App\WorkflowFoundation\Input\Validations\BaseValidation;
use Validator;


class CourseOnlineValidation extends BaseValidation
{

    // 验证方法的访问权限必须 < public
    protected function index($inputData)
    {
        $message = [

            'name.required' => 'name参数为必填项'
        ];
        return Validator::make($inputData, [

            'name' => 'required',
            
        ], $message);
    }

}

