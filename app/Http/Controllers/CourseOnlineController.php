<?php

namespace App\Http\Controllers;

use App\Workflow\Input\Conversion\BaseConversion;
use App\Workflow\Input\Conversion\CourseOnlineConversion;
use Illuminate\Http\Request;

class CourseOnlineController extends Controller
{

    public function index(Input $input, Business $business, Output $output)
    {

        // 输入( workflow.input.data )
        $input->handle([

            CourseOnlineValidation::class => 'index',

            CourseOnlineConversion::class => ['index']

        ]);

        // 业务处理( 想象成黑匣子 | workflow.business.data )
        $business->handle([

            // 只做业务 , 并且要求业务完全只由它完成
            CourseOnlineManager::class => 'index'
        ]);

        // 输出( workflow.output.data )
        return $output->handle([

            CourseOnlineFilter::class => 'index'
        ]);
    }


    // 购买线上课程
    public function pay(Input $input, Business $business, Output $output)
    {

        // 输入
        $input->handle([

            CourseOnlineValidation::class => 'pay',
            CourseOnlineConversion::class => 'pay'
        ]);


        // 业务处理
        $business->handle([

            // 只做业务 , 并且要求业务完全只由它完成
            CourseOnlineManager::class => 'pay',

        ]);

        // 输出
        $output->handle([

            CourseOnlineFilter::class => 'pay'
        ]);

    }

}


