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





    /*--start-------------非必须使用 , 只是提供此技术以应对有时候奇葩的需求-----------------*/

    // 钩子 , 钩子勾住 $method 方法 , 表示在执行 被调用类 的 $method 方法之前/之后 , 先执行 $callback 回调函数
    // 只是提供一个方式而已 , 不是必须选择的
    final public function hook($method, Closure $callback, $before)
    {
        Hook::set($callback, [static::class, $method, $before, 'notImmediately']);
    }


    // hook 住 , 并且立即执行
    // 只是提供一个方式而已 , 不是必须选择的
    final public function hookAndRun($method, Closure $callback, $before, ...$arguments)
    {
        Hook::set($callback, [static::class, $method, $before, 'immediately']);
        return $this->run($method, ...$arguments);
    }


    // 业务开始运转
    // 只是提供一个方式而已 , 不是必须选择的
    final public function run($method, ...$arguments)
    {
        // 前置操作
        $this->before();


        // -------> 勾住,在业务执行前执行
        $hook = [static::class, $method, 'before', 'notImmediately'];
        if (Hook::has($hook) && !with(null, Hook::get($hook))) {

            // 如果回调函数返回 false 则将不再向下执行
            return false;
        }

        // 执行业务(不一定有返回值 , $data可能为null)
        $data = $this->$method(...$arguments);


        // -------> 勾住,在业务执行后执行
        $hook[2] = 'after';
        if (Hook::has($hook)) {

            // 执行回调函数
            with(null, Hook::get($hook));
        }


        // 后置操作
        $this->after();

        return (!is_null($data)) ?: 0;
    }


    final public static function __callStatic($name, $arguments)
    {
        if (in_array($name, ['hook', 'run', 'hookAndRun'])) {

            return Memory::get(static::class, 'pool')->$name(...$arguments);
        }

        return responseJsonOfSystemError([], 4444, Str::strcat('BaseService无法调用', $name, '方法,因为此方法不存在'));
    }

    /*--end-------------非必须使用 , 只是提供此技术以应对有时候奇葩的需求-----------------*/


}



