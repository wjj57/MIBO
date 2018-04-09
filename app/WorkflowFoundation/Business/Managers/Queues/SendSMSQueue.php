<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 下午8:51
 */

namespace App\WorkflowFoundation\Business\Managers\Queues;


// 发送短信队列 -> 对应的任务表是 sms_jobs ( 短信任务 )

class SendSMSQueue extends BaseQueue
{

    // 队列推入一条新任务
    public function push($job)
    {


    }

    // 队列推出一条任务
    public function pop($job)
    {


    }

    // 队列开始工作
    public function handle()
    {

    }

}