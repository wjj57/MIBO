<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 上午1:09
 */

namespace App\Workflow\Managers;


class BaseManager
{

    function __construct()
    {
        $this->before();
    }

    // 要不要将 before 方法 替换成 构造函数 ？
    protected function before()
    {
        Memory::set('workflow.status', 'manager');
    }

    protected function after()
    {


    }

}