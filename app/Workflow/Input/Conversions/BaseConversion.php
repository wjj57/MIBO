<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/2
 * Time: 下午10:49
 */

namespace App\Workflow\Input\Conversion;


class BaseConversion
{

    function __construct()
    {

        $this->before();
    }

    protected function before()
    {

        Memory::set('workflow.status','conversion') ;

    }

    protected function after()
    {


    }




}