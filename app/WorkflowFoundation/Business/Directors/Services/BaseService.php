<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/3
 * Time: 上午12:05
 */

namespace App\WorkflowFoundation\Business\Directors\Services;


use App\Workflow\Memory;

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