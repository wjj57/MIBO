<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/31
 * Time: 下午5:11
 */

namespace App\Workflow;


class Memory
{

    protected static $data = [];

    public static function set($key = null, $value = null)
    {
        if (is_array($key)) {

            foreach ( $key as $key1 => $value1 ){

                self::$data[$key1] = $value1;
            }

            return;
        }

        self::$data[$key] = $value;
    }

    public static function get($key = null)
    {
        if (is_null($key)) {

            return self::$data;
        }
        return self::$data[$key];
    }

    public static function pull($key)
    {
        $value = self::$data[$key];

        unset(self::$data[$key]);

        return $value;
    }

}