<?php

namespace workflowOfAdmin\moduleOfCourseOnline;

use workflowFoundation\BaseController;
use workflowFoundation\Business;
use workflowFoundation\Input;
use workflowFoundation\Output;



class CourseOnlineController extends BaseController
{


    // 首先执行
    // 穿过控制器的方法前 , 首先要穿过已配置的中间件中
    function __construct()
    {
        // 此中间件会应用到此控制器的 所有的方法里
        $this->middleware("");

        // 此中间件只会应用到此控制器除 X 之外的所有方法上
        $this->middleware("")->except('');

        // 此中间件只会应用到此控制器的 X 方法上
        $this->middleware("")->only('');

        // 中间件全部穿过完以后 , 才会执行以下控制器的方法
    }



    // 发行专辑
    // 已穿过此方法配置的所有的中间件
    public function dummyMethod(Input $input, Business $business, Output $output)
    {

        // 输入处理
        $input->handle([

            // 传入想要让 Input 执行的依赖操作
        ]);

        // 业务处理
        $business->handle([

            // 传入想要让 Business 执行的依赖操作
        ]);

        // 输出处理
        $output->handle([

            // 传入想要让 Output 执行的依赖操作
        ]);

    }


}