<?php

namespace App\Workflow\Actions\Validations;


class BaseValidation
{

    protected static $inputData = null;

    function __construct()
    {


        $this->before();
    }

    protected function before()
    {
        Memory::set('workflow.status', 'validation');

        if (is_null(self::$inputData)) {

            self::$inputData = Memory::get('workflow.input.data');
        }

    }

    protected function after()
    {


    }

    protected static function validatorMayEmitException()
    {

    }


}