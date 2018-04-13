<?php

namespace App\Workflow\Input\Validations;

use App\WorkflowFoundation\Input\Validations\BaseValidation;
use Validator;

class CourseOnlineValidation extends BaseValidation
{

    public function pay()
    {
        $message = [
            'name.required' => '姓名为必填项',
        ];

        self::failedWillEmitException(Validator::make(self::$inputData, [

            'name' => ['required', ''],

        ], $message));
    }

    public function index()
    {
        $message = [
            'name.required' => '姓名为必填项',
        ];
        self::failedWillEmitException(Validator::make(self::$inputData, [

            'name' => []
        ], $message));
    }

}