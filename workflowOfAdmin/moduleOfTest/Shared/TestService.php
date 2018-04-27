<?php

namespace workflowOfAdmin\moduleOfTest\Shared;

use workflowFoundation\Business\DirectorRelied\BaseService;

class TestService extends BaseService
{


    public function dummyMethod()
    {

        // 为极大的保证服务的可重用性 ,
        // 服务中的入口验证判断等一定要使用服务的前置钩子完成 , 一定不能写在服务的内部
        // 否则服务的可重用性将会降低

        // 运行到这里 , 就说明已经是完全可信的了

        /**
         *
         * .........做很多的操作
         *
         */

        return "" ;
    }




}