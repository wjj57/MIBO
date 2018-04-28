<?php

namespace workflowFoundation\Shared\Queues;

interface QueueImpl
{

    // 开始运行此队列
    public function startRun();

    // 停止运行此队列
    public function stopRun();

    // 推入一条新任务到队列中
    public function push($job);

    // 把队列中最后的一条任务弹出
    public function pop();

    // 移除队列中的未执行的某一个任务
    public function remove($job);

}