<?php

namespace App\Workflow\Actions\Validations;


class CourseOnlineValidation
{

    protected function before()
    {
        Memory::set('workflow.status', 'validation');
    }

    //
    protected function after()
    {


    }

    public function index()
    {
        $this->before();

        $validator = Validator::make(Memory::get('workflow.input.data'), [

            'name' => []
        ]);

        if ($validator->fails()) {

            return throw new Exception();
        }

    }

}