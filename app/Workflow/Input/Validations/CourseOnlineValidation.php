<?php

namespace App\Workflow\Actions\Validations;

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