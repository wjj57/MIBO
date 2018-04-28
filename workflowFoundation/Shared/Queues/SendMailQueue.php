<?php

namespace workflowFoundation\Shared\Queues;


// 发送邮件队列 -> 对应的任务表是 email_jobs ( 邮件任务 )

use Illuminate\Contracts\Queue\Queue;

class SendMailQueue implements Queue
{

    public function handle()
    {

    }

}