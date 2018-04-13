<?php
/**
 * Created by PhpStorm.
 * User: Lvsi-China
 * Date: 18/4/12
 * Time: 上午1:04
 */

namespace App\WorkflowFoundation\Business\Directors\FlowControl;


// 可中断的流程控制
class InterruptableFlowControl extends FlowControl
{

    // 开始
    public static function into()
    {

        // 有一个地方出现错误 , 就中断此流程
        // 只有当全部都执行成功时 , 才会正常结束


    }

    // 下一步
    public static function next()
    {


    }

    // 中断
    public function interrupt()
    {


    }

    // 结束
    public function out()
    {


    }

}