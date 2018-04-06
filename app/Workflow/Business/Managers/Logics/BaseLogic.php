<?php


namespace App\Workflow\Business\Managers\Logics;


use App\Workflow\Memory;

class BaseLogic
{
    // 逻辑分为 : 可中断逻辑 , 可连续逻辑

    protected static $instance = null;

    protected function before()
    {
        Memory::set('workflow.status', 'logic');
    }

    protected function after()
    {


    }

    function __construct()
    {
        $this->before();
    }

    // 开始分析逻辑
    public static function analyze($method, ...$production)
    {
        if (is_null(self::$instance)) {

            self::$instance = new static();
        }
        return self::$instance->$method(...$production);
    }


}



