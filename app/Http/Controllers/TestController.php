<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator ;

class TestController extends Controller
{


    public function test()
    {

        echo 'wait' ;

        $data = [
            'id' => '1'
        ] ;
        $validator = Validator::make($data,[

            'id' => ['integer']
        ]);

        if($validator->fails()){

            return '失败' ;
        }

        return '成功' ;
    }

}
