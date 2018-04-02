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

    public function register()
    {

        $production1 = (new AService())->run();
        $production2 = (new BService())->run($production1);
        $production3 = (new CService())->run($production2);

        // 把一个新任务放到队列中
        putJobIntoQueue($production3, SendEMailQueue::class);

        $production = $production1 + $production2 + $production3;

        Memory::set('workflow.business.data', $production);
    }

    public function index()
    {

        $production1 = (new AService())->run();
        $production2 = (new ZService())->run($production1);
        $production3 = (new CService())->run($production2);

        // 把一个新任务放到队列中
        putJobIntoQueue($production3, SendEMailQueue::class);

        $production = $production1 + $production2 + $production3;

        Memory::set('workflow.business.data', $production);
    }


}