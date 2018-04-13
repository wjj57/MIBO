<?php

namespace App\WorkflowFoundation\Business\Directors\Redis;

// 获取 Redis 实例
class RedisInstance
{

    private static $instance = null;

    public static function instance()
    {

        if (is_null(self::$instance)) {

            self::$instance = new \Predis\Client(
                config('database.redis.default')
            );
        }

        return self::$instance ;
    }

}