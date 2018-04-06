<?php

namespace App\Workflow\Actions\Validations;

use Validator;

class CourseOnlineValidation extends BaseValidation
{

    public function pay()
    {
        $message = [];
        self::failedMayEmitException(Validator::make(self::$inputData, [

            'name' => ['required', ''],
        ],$message));
    }

    public function index()
    {
        $message = [];
        self::failedMayEmitException(Validator::make(self::$inputData, [

            'name' => []
        ],$message));
    }

}