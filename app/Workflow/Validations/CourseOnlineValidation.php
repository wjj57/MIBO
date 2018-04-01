<?php

namespace App\Workflow\Actions\Validations;


class CourseOnlineValidation
{

    protected function before()
    {
        MemoryFragmentation::set('workflow.status', 'validation');
    }

    //
    protected function after()
    {


    }

    public function index()
    {
        $this->before();

        $validator = Validator::make(MemoryFragmentation::get('workflow.input.data'), [

            'name' => []
        ]);

        if ($validator->fails()) {

            return throw new Exception();
        }

    }

}