<?php


namespace App\WorkflowFoundation\Shared\Hooks;


// 钩子管理器( 此时的 Hook 是名词 )
class Hook
{

    // 当前的 hooks
    private static $hooks = [];

    // 存储 Hook
    public static function set($callback, ...$arguments)
    {
        array_set(self::$hooks, implode('.', $arguments), $callback);
    }

    // 获取 Hook
    public static function get(...$arguments)
    {
        return array_get(self::$hooks, implode('.', $arguments));
    }

    // Hook 是否存在
    public static function has(...$arguments)
    {
        return array_has(self::$hooks, implode('.', $arguments));
    }

    // 销毁掉
    public static function destroy()
    {
        self::$hooks = null;
        unset(self::$hooks);
    }
}