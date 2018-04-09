<?php

namespace App\Http\Controllers;
use App\Workflow\Actions\Validations\CourseOnlineValidation;
use App\Workflow\Business;
use App\Workflow\Input;
use App\Workflow\Managers\CourseOnlineManager;
use App\Workflow\Managers\Services\Common\Upload\UploadVideoService;
use App\Workflow\Output;
use App\Workflow\Output\Filters\CourseOnlineFilter;

class CourseOnlineController2 extends Controller
{


    public function index(Input $input, Business $business, Output $output)
    {

        $input->handle([

            // 二者的顺序也是有影响的
            Clock::class => 'startClock',

            CourseOnlineValidation::class => 'index',
        ]);

        $business->handle([

            CourseOnlineService::class => '' ,

        ]);

        return $output->handle([

            // 计时和日志
            Clock::class => 'clearClock',

            CourseOnlineFilter::class => 'index'
        ]);
    }

}


