<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Foundation\BaseController;

use App\Workflow\Business\Directors\CourseOnlineDirector;
use App\Workflow\Input\Validations\CourseOnlineValidation;
use App\Workflow\Output\Filters\CourseOnlineFilter;
use App\WorkflowFoundation\Business;
use App\WorkflowFoundation\Input;
use App\WorkflowFoundation\Output;


class CourseOnlineController extends BaseController
{

    function __construct()
    {
        // 为不同的方法定义不同的中间件
        $this->middleware('auth');
    }


    public function index(Input $input, Business $business, Output $output)
    {

        $input->handle([

            CourseOnlineValidation::class => 'index',
        ]);

        $business->handle([

            CourseOnlineDirector::class => 'index'
        ]);

        return $output->handle([

            CourseOnlineFilter::class => 'index'
        ]);

    }


    // 购买线上课程
    public function pay(Input $input, Business $business, Output $output)
    {
        // 输入( workflow.input.data )
        $input->handle([

            // Clock::class => 'startClock' , // 开始计时
            CourseOnlineValidation::class => 'index',
        ]);

        // 业务处理( 想象成黑匣子 | workflow.business.data )
        $business->handle([


            // Clock::class => 'stopClock' // 停止计时 : 记录下从开始到现在运行的时间
            // 只做业务 , 并且要求业务完全只由它完成
            CourseOnlineDirector::class => 'index'
        ]);

        // 输出( workflow.output.data )
        return $output->handle([

            // Clock::class => 'clearClock' // 清理计时 : 记录下从开始到现在运行的时间 , 并且
            CourseOnlineFilter::class => 'index'
        ]);


    }

}


