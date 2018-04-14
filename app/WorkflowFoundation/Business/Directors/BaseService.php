<?php

namespace App\WorkflowFoundation\Business\Directors;


use App\WorkflowFoundation\Memory;

class BaseService
{

    protected static $instance = null;

    protected function before()
    {
        Memory::set('workflow.status', 'service');
    }

    function __construct()
    {

        $this->before();
    }

    function __call($name, $arguments)
    {

    }


    // 业务开始运转
    public static function run($method, ...$production)
    {
        if (is_null(self::$instance)) {

            self::$instance = new static();
        }
        return self::$instance->$method(...$production);
    }

}