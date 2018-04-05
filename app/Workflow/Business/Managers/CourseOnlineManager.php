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
    }

    public function index()
    {

    }


    public function pay()
    {

        Memory::set('workflow.business.data', $production3);
    }

}