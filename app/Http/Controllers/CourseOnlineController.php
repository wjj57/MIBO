<?php

namespace App\Http\Controllers;
use App\Workflow\Actions\Validations\CourseOnlineValidation;
use App\Workflow\Business;
use App\Workflow\Input;
use App\Workflow\Managers\CourseOnlineManager;
use App\Workflow\Output;
use App\Workflow\Output\Filters\CourseOnlineFilter;

class CourseOnlineController extends Controller
{

    public function index(Input $input, Business $business, Output $output)
    {

        // 输入( workflow.input.data )
        $input->handle([

            CourseOnlineValidation::class => 'index',
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


