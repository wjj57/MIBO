<?php


namespace App\Workflow\Input\Conversion;


class CourseOnlineConversion extends BaseConversion
{


    public function index()
    {
        self::convert(self::$inputData,[

            'id' => [],

            'users.*.name.*'
        ]);
    }


    public function pay()
    {


    }

}