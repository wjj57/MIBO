<?php

namespace App\WorkflowFoundation\Business\Directors;

use App\WorkflowFoundation\Memory;


/**
 * 负责人 : 负责调用各个 Service
 *
 * Class BaseDirector
 * @package App\WorkflowFoundation\Business\Directors
 */
class BaseDirector
{

    // 存储的是 workflow.business.data.portionOfInput 中的数据
    protected static $inputData = null;

    // 存储的是 workflow.business.data.portionOfService 中的数据
    protected static $serviceData = null;

    // 前置操作
    protected function before()
    {
        // 记录当前的 workflow 状态为 director , 并为 $inputData 和 $serviceData 赋值
        Memory::set('workflow.status', 'director');
        self::$inputData = (!is_null(self::$inputData)) ?: Memory::get('workflow.business.data.portionOfInput');
        self::$serviceData = (!is_null(self::$serviceData)) ?: Memory::get('workflow.business.data.portionOfService');
    }

    // 后置操作
    protected function after()
    {

    }

    function __construct()
    {
        $this->before();
    }

}