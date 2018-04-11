<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function test()
    {

        try {
            $redis = new \Predis\Client(
                config('database.redis.default')
            );

            return $redis->config('GET', 'requirepass');

        } catch (\Throwable $e) {

            return $e->getMessage();
        }
    }

}

