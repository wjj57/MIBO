<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 上午12:35
 */

namespace App\Workflow\Filters;


class CourseOnlineFilter extends BaseFilter
{

    protected $data;

    protected function before()
    {
        Memory::set('workflow.status', 'filter');

        $this->data = Memory::get('workflow.output.data');
    }

    protected function after()
    {
        Memory::set('workflow.output.data', $this->data);
    }

    public function index()
    {

        $this->before();

        foreach ($this->data as $item) {


        }

        $this->after();
    }

}