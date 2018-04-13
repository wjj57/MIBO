<?php

namespace App\WorkflowFoundation;

class Memory
{

    protected static $data = [];

    // 设置数据
    public static function set($key = null, $value = null)
    {
        if (is_array($key)) {

            foreach ($key as $key1 => $value1) {

                self::$data[$key1] = $value1;
            }

            return;
        }

        self::$data[$key] = $value;
    }

    // 获取数据
    public static function get($key = null)
    {
        if (is_null($key)) {

            return self::$data;
        }
        return self::$data[$key];
    }

    // 返回并删除数据
    public static function pull($key)
    {
        $value = self::$data[$key];

        unset(self::$data[$key]);

        return $value;
    }


    // 移动数据
    public static function move($from, $to)
    {

        self::$data[$to] = self::pull($from);
    }

}