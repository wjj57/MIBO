<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 下午8:51
 */

namespace App\Workflow\Managers\Queues;

use App\Workflow\Business\Managers\Foundation\Queues\BaseQueue;


// 发送邮件队列 -> 对应的任务表是 email_jobs ( 邮件任务 )

class SendMailQueue extends BaseQueue
{

    public function handle()
    {

    }

}