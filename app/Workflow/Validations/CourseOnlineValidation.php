<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午11:17
 */

namespace App\Workflow\Actions\Validations;


class CourseOnlineValidation
{

    protected function before()
    {
        MemoryFragmentation::set('workflow.status', 'validation');
    }

    public function index()
    {

        $validator = Validator::make(MemoryFragmentation::get('workflow.input.data'), [

            'name' => []
        ]);

        if ($validator->fails()) {

            return throw new Exception();
        }

    }

}