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

    protected static $inputData = null;

    function __construct()
    {

        $this->before();
    }


    protected function before()
    {

        Memory::set('workflow.status', 'conversion');

        if (is_null(self::$inputData)) {

            self::$inputData = Memory::get('workflow.input.data');
        }
    }

    protected function after()
    {


    }


    protected static function convert($inputData)
    {


    }


}