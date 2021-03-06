<?php

namespace workflowOfAdmin\moduleOfCourseOnline;

use workflowFoundation\BaseController;
use workflowFoundation\Business;
use workflowFoundation\Input;
use workflowFoundation\Output;
use workflowOfAdmin\moduleOfCourseOnline\Input\CourseOnlineValidation;
use workflowOfAdmin\moduleOfCourseOnline\Business\CourseOnlineDirector;
use workflowOfAdmin\moduleOfCourseOnline\Output\CourseOnlineFilter;

// route -> 发往 -> 控制器的某个方法
class CourseOnlineController extends BaseController
{


    // 首先执行此构造函数
    // 执行控制器的某个方法前 , 首先要穿过构造函数里面配置的中间件
    function __construct()
    {
        // 此中间件会应用到此控制器的所有的方法里
         $this->middleware("");

        // 此中间件只会应用到此控制器除 X 方法之外的所有方法上
         $this->middleware("")->except('');

        // 此中间件只会应用到此控制器的 X 方法上
         $this->middleware("")->only('');

        // 中间件全部穿过完以后 , 才会执行以下控制器的方法
    }



    /**
     * 控制器的方法
     * 已穿过了所有的中间件 , 开始执行方法
     * ①: 方法访问权限必须为 public
     * ②: 方法的参数只能是 Input , Business , Output
     * ③: 不需要返回参数
     */
    public function dummyMethod(Input $input, Business $business, Output $output)
    {

        // 输入处理
        $input->handle([

            // 传入想要让 Input 执行的依赖操作 , 如 Validation
            CourseOnlineValidation::class => "dummyMethod"
        ]);

        // 业务处理
        $business->handle([

            // 传入想要让 Business 执行的依赖操作 , 如 Director
            CourseOnlineDirector::class => "dummyMethod"
        ]);

        // 输出处理
        $output->handle([

            // 传入想要让 Output 执行的依赖操作 , 如 Filter
            CourseOnlineFilter::class => "dummyMethod"
        ]);

    }




    public function index(Input $input, Business $business, Output $output)
    {

        // 输入处理
        $input->handle([

            // 传入想要让 Input 执行的依赖操作 , 如 Validation
            CourseOnlineValidation::class => "index"
        ]);

        // 业务处理
        $business->handle([

            // 传入想要让 Business 执行的依赖操作 , 如 Director
            CourseOnlineDirector::class => "index"
        ]);

        // 输出处理
        $output->handle([

            // 传入想要让 Output 执行的依赖操作 , 如 Filter
            CourseOnlineFilter::class => "index"
        ]);
    }


}