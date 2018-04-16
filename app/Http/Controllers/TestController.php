<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class TestController extends Controller
{

    public function test()
    {

        $data = [] ;
        array_set($data,'workflow.input.data',['name'=>'ls']);
        print_r($data);
    }

}

