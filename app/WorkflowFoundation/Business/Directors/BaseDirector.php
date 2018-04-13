<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 上午1:09
 */

namespace App\WorkflowFoundation\Business\Directors;

use App\Workflow\Memory;


/**
 * 负责人
 * 负责调用各个Service,
 *
 */
class BaseDirector
{

    protected static $businessData = null;

    // 要不要将 before 方法 替换成 构造函数 ？
    protected function before()
    {
        Memory::set('workflow.status', 'director');

        if (is_null(self::$businessData)) {

            self::$businessData = Memory::get('workflow.business.data');
        }
    }

    protected function after()
    {

    }

    function __construct()
    {
        $this->before();
    }

}