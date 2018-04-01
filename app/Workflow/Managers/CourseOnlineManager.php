<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:34
 */

namespace App\Workflow\Managers;


use App\Workflow\Managers\Queues\SendEMailQueue;
use App\Workflow\Managers\Queues\SendSMSQueue;

class CourseOnlineManager extends BaseManager
{

    // 要不要将 before 方法 替换成 构造函数 ？
    protected function before()
    {
        MemoryFragmentation::set('workflow.status', 'manager');

    }


    public function register()
    {

        // 服务1开始处理
        // 服务1处理结束
        putIntoQueue( SendEMailQueue::class ) ;

        // 服务2开始处理
        // 服务2处理结束
        putIntoQueue( SendSMSQueue::class ) ;


        // 服务3开始处理
        // 服务3处理结束
        putIntoQueue(  ) ;


    }

    public function index()
    {

        // 各个业务互相配合处理

        // 业务处理
        (new UploadService())->handle();

        array_push($data = [], [


        ]);

        MemoryFragmentation::set('workflow.business.data', $data);
    }


}