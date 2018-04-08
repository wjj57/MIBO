<?php

namespace App\Workflow\Actions\Validations;

use App\Workflow\Memory;



class BaseValidation
{

    protected static $inputData = null;

    protected function before()
    {
        Memory::set('workflow.status', 'validation');

        if (is_null(self::$inputData)) {

            self::$inputData = Memory::get('workflow.input.data');
        }
    }

    protected function after()
    {
        unset(self::$inputData);
    }

    function __construct()
    {
        $this->before();
    }


    protected static function failedWillEmitException($validator)
    {

        if($validator->fails()){

            return responseJsonOfFailure([],4444,'','validation') ;
        }

        return 0;
    }


}