<?php

namespace App\WorkflowFoundation\Business\Directors;

use App\WorkflowFoundation\Shared\Hooks\Hook;
use App\WorkflowFoundation\Shared\Memory\Memory;
use Closure;
use Illuminate\Support\Str;


class BaseService
{
    // 前置操作
    protected function before()
    {
    }

    // 后置操作
    protected function after()
    {


    }

    // 钩子 , 钩子勾住 $method 方法 , 表示在执行 被调用类 的 $method 方法之前/之后 , 先执行 $callback 回调函数
    public function hook($method, Closure $callback, $before = true, $immediately = true, ...$arguments)
    {
        $before = $before ? 'before' : 'after';
        $immediately = $immediately ? 'immediately' : 'notImmediately';
        Hook::set($callback, [static::class, $method, $before, $immediately]);

        if ($immediately) {
            return $this->run($method, ...$arguments);
        }

        return 0;
    }

    // 业务开始运转
    public function run($method, ...$arguments)
    {
        // 前置操作
        $this->before();


        // -------> 勾住,在此执行
        $hook = [static::class, $method, 'before', 'notImmediately'];
        if (Hook::has($hook)) {

            $callback = Hook::get($hook);
            if (!$callback()) {

                return false;
            }
        }

        // 执行业务(不一定有返回值 , $data肯为null)
        $data = $this->$method(...$arguments);


        // -------> 勾住,在此执行
        $hook[2] = 'after';
        if (Hook::has($hook)) {

            $callback = Hook::get($hook);
            $callback();
        }


        // 后置操作
        $this->after();

        return (!is_null($data)) ?: 0;
    }


    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, ['hook', 'run'])) {

            return Memory::get(static::class, 'pool')->$name(...$arguments);
        }

        return responseJsonOfSystemError([], 4444, Str::strcat('BaseService无法调用', $name, '方法,因为此方法不存在'));
    }

}



