<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function test()
    {
        var_dump(config('app'));
    }

}

