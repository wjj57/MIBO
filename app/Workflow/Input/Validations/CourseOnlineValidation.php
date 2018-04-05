<?php

namespace App\Workflow\Actions\Validations;


class CourseOnlineValidation extends BaseValidation
{


    public function pay()
    {
        slef::validatorMayEmitException(Validator::make(self::$inputData, [

            'name' => [ 'required' , '' ]
        ]));
    }

    public function index()
    {
        self::validatorMayEmitException(Validator::make(self::$inputData, [

            'name' => []

        ]));
    }

}