<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 下午11:50
 */

namespace App\WorkflowFoundation\Shared\Queues;


class BaseQueue
{

    public function run()
    {

    }

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