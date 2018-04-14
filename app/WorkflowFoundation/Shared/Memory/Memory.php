<?php

namespace App\WorkflowFoundation\Shared\Memory;

/**
 * 内存( Memory = workflow + pool )
 * pool : 资源池
 * workflow : 工作流数据(Input数据 + Business数据 + Output数据)
 * Class Memory
 * @package App\WorkflowFoundation\Shared\Memory
 */
class Memory
{

    // 存储的数据
    protected static $data = null;

    // 设置数据
    public static function set($key, $value = null)
    {
        if (is_array($key)) {

            foreach ($key as $key1 => $value1) {

                self::$data[$key1] = $value1;
            }

            return;
        }

        if (is_string($key) && is_string($value)) {

            self::$data[$key] = $value;
            return;
        }

        return;
    }

    /**
     * 更新数据
     * @param $key null
     * @param $value null
     */
    public static function update($key, $value = null)
    {
        self::set($key, $value);
    }

    /**
     * 获取数据( 返回全部的数据或者返回某个键的值 )
     * @param $key null|string
     * @return null|mixed
     */
    public static function get($key = null)
    {
        if (is_null($key)) {

            return self::$data;
        }
        return self::$data[$key];
    }

    /**
     * 返回数据并将此数据删除
     * @param $key
     * @return mixed
     */
    public static function pull($key)
    {
        $value = self::$data[$key];

        unset(self::$data[$key]);

        return $value;
    }

    /**
     * 移动数据(将数据从一个地方移动到另一个地方)
     * 参数可以为 : move(['from'=>'to']) 或者 move($from, $to)
     * @param $from array | string
     * @param $to
     */
    public static function move($from, $to = null)
    {

        // 只有一个 from 参数 , 并且 from 参数是数组
        if (is_array($from)) {

            foreach ($from as $key => $value) {

                self::$data[$to] = self::pull($from);
            }
            return;
        }

        // from参数 和 to参数 都有 , 并且都是字符串
        if (is_string($from) && is_string($to)) {

            self::$data[$to] = self::pull($from);
            return;
        }

        return;
    }

    /**
     * 销毁数据
     * @param $key true | string
     */
    public static function destroy($key)
    {

        if ($key === true) {

            unset(self::$data);
            return;
        }

        if (is_string($key)) {

            unset(self::$data[$key]);
            return;
        }

        return;
    }

}