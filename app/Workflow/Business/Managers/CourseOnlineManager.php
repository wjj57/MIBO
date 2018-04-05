<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:34
 */

namespace App\Workflow\Managers;


use App\Workflow\Business\Managers\BaseManager;
use App\Workflow\Business\Managers\Services\CourseOnlineService;
use App\Workflow\Managers\Logics\CourseOnlineLogic;
use App\Workflow\Managers\Queues\SendEMailQueue;
use App\Workflow\Memory;

class CourseOnlineManager extends BaseManager
{


    // 在 Logic 类的方法体中，使用到的方法都是静态方法
    public function login()
    {

        $data = self::$businessData;

        CourseOnlineService::run($production2, 'processXXXX');
    }

    public function register()
    {

        // 永远只有这些操作
        $production1 = (new AService())->run();
        $production2 = (new BService())->run($production1);
        $production3 = (new CService())->run($production2);

        // 把一个新任务放到队列中
        pushJobIntoQueue($production3, SendEMailQueue::class);

        $production = $production1 + $production2 + $production3;

        Memory::set('workflow.business.data', $production);
    }

    public function index()
    {

        $production1 = (new AService())->run();
        $production2 = (new ZService())->run($production1);
        $production3 = (new CService())->run($production2);


        // 把一个新任务放到队列中
        pushJobIntoQueue($production3, SendEMailQueue::class);

        $production = $production1 + $production2 + $production3;

        Memory::set('workflow.business.data', $production);
    }


    public function pay()
    {

        Memory::set('workflow.business.data', $production3);
    }

}