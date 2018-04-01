<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseOnlineController extends Controller
{

    public function index(Input $input, Business $business, Output $output)
    {

        // 输入
        $input->handle([

            CourseOnlineValidation::class => 'index'
        ]);

        // 业务处理( 想象成黑匣子 )
        $business->handle([

            CourseOnlineManager::class => 'index'
        ]);

        // 输出
        return $output->handle([

            CourseOnlineFilter::class => 'index'
        ]);
    }
}


