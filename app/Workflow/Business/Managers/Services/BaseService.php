<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/3
 * Time: 上午12:05
 */

namespace App\Workflow\Business\Managers\Services;


use App\Workflow\Memory;

class BaseService
{

    protected static $instance = null;

    public static function run($production, $method)
    {
        if (is_null(self::$instance)) {

            self::$instance = new static();
        }

        return self::$instance->$method();
    }


    function __construct()
    {

        $this->before();
    }

    protected function before()
    {
        Memory::set('workflow.status', 'service');
    }


}