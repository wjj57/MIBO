<?php

namespace App\Workflow\Actions\Validations;

use Validator;

class CourseOnlineValidation extends BaseValidation
{

    public function pay()
    {
        self::failedMayEmitException(Validator::make(self::$inputData, [

            'name' => [ 'required' , '' ]
        ]));
    }

    public function index()
    {
        self::failedMayEmitException(Validator::make(self::$inputData, [

            'name' => []

        ]));
    }

}