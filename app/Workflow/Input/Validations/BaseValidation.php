<?php

namespace App\Workflow\Actions\Validations;


class BaseValidation
{

    protected $inputData = null;

    function __construct()
    {

        $this->before();
    }

    protected function before()
    {
        Memory::set('workflow.status', 'validation');
    }

    protected function after()
    {


    }

}