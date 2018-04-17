<?php

namespace App\WorkflowFoundation\Shared\Constants;

/**
 * 需要的所有常量
 * Class Constant
 * @package App\WorkflowFoundation\Shared\Constants
 */
class Constant
{

    // workflow 和 pool
    const WORKFLOW = 'workflow';
    const POOL = 'pool';

    // workflow.status
    const WORKFLOW_STATUS = 'workflow.status';

    // workflow.input.data,workflow.business.data,workflow.output.data
    const WORKFLOW_INPUT_DATA = 'workflow.input.data';
    const WORKFLOW_BUSINESS_DATA = 'workflow.business.data';
    const WORKFLOW_OUTPUT_DATA = 'workflow.output.data';

    // workflow的3种状态数据
    const WORKFLOW_THREE_STATES_DATA = [

        self::WORKFLOW_INPUT_DATA,
        self::WORKFLOW_BUSINESS_DATA,
        self::WORKFLOW_OUTPUT_DATA,
    ];


    // Hook 在 Service 执行前 , 执行后才执行业务
    const HOOK_SERVICE_AT_BEFORE = 'before';
    const HOOK_SERVICE_AT_AFTER = 'after';


}