<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 下午8:51
 */

namespace App\Workflow\Managers\Queues;


class SendEMailQueue extends Queue
{

    protected function before()
    {


    }

    protected function after()
    {


    }

    public function handle()
    {

        $this->before();

    }

}