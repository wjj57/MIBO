<?php

namespace App\Workflow\Actions\Validations;


class CourseOnlineValidation extends BaseValidation
{


    public function pay()
    {

        $validator = Validator::make(Memory::get('workflow.input.data'), [

            'name' => []
        ]);

        if ($validator->fails()) {

            return throw new Exception();
        }

    }

    public function index()
    {

        $validator = Validator::make(Memory::get('workflow.input.data'), [

            'name' => []
        ]);

        if ($validator->fails()) {

            return throw new Exception();
        }

    }

}