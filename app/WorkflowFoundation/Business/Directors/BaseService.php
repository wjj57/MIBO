<?php

namespace App\WorkflowFoundation\Business\Directors;

class BaseService
{

    protected static $instance = null;

    protected function before()
    {
    }

    protected function after()
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