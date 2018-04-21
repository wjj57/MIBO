<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{

    public function test()
    {

        $data = (new Request())->all();


    }

}

