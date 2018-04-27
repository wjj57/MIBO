<?php

namespace workflowOfAdmin\moduleOfTest\Business;

use App\Exceptions\ServiceException;
use workflowFoundation\Business\BaseDirector;


// 业务负责人
class TestDirector extends BaseDirector
{
     /**
      * 业务方法
      * ①: 方法访问权限必须为 protected
      * ②: 方法的参数只能是 $input(Input输入的数据) 和 Service类(真正处理业务)
      */
    protected function dummyMethod($inputData)
    {
        // 定义业务数据
        $business = [];

        try {

            // 业务调度

        } catch (ServiceException $e) {

            // 响应失败
            return responseJsonOfFailure([], $e->getMessage(), true);
        }

        // 完成业务数据的存放
        $business['res'] = [];

        // 返回业务数据
        return $business;
    }

}