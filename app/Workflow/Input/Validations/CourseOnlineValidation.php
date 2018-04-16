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

        ];
        return Validator::make($inputData, [

            'name' => '',
            
        ], $message);
    }

}

