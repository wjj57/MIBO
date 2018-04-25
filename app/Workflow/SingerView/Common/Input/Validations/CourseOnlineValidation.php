<?php

namespace App\Workflow\Input\Validations;

use App\WorkflowFoundation\Input\Validations\BaseValidation;
use Illuminate\Http\Request;
use Validator;


class CourseOnlineValidation extends BaseValidation
{

    // 验证方法的访问权限必须 < public
    // 返回验证器Validator
    protected function buy($inputData)
    {
        $message = [

            'id.required' => '必须有id',
        ];
        return Validator::make($inputData, [

            'id' => 'bail|required',

        ], $message);
    }

}

