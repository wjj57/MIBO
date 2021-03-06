<?php

namespace workflowOfAdmin\moduleOfCourseOnline\Business;

use App\Exceptions\ServiceException;
use workflowFoundation\Business\BaseDirector;
use workflowOfAdmin\moduleOfCourseOnline\Shared\CourseOnlineModel;

/**
 * 业务负责人
 *
 * 没有任何代码规范要求 , 只要求在 Director 的方法里 , 处理业务的代码不能超过50行
 *
 * 业务逻辑简单时(业务代码在50行以内) :
 * 在 Director 中使用 model 即可 , 如增删改查等简单的操作
 *
 * 业务逻辑复杂时 :
 * 需要在此模块下的Shared文件夹中创建一个Service(命名为模块名+方法名+Service) , 调用此Service不同的方法
 * 同时 , 此模块下的Shared文件夹中提供了一个共用的Service , 命名为 : 模块名Service , 此模块共用的一些业务操作都可以放里面
 */
class CourseOnlineDirector extends BaseDirector
{
    /**
     * 业务方法
     * ①: 方法访问权限必须为 protected
     * ②: 方法的参数只能是 $input(Input输入的数据) 和 Service(真正处理业务逻辑的类)
     */
    protected function dummyMethod($inputData)
    {
        // 定义业务数据
        $business = [];

        try {

            // 开始业务
            // 如果出现某些错误或失败 , 则抛出 ServiceException 异常 ,
            // 一定不能在 try 中使用 responseJsonOfFailure()

        } catch (ServiceException $e) {

            // 失败 : 响应到前端
            return responseJsonOfFailure([], $e->getMessage(), true);
        }

        // 完成业务数据的存放
        $business['res'] = [];

        // 成功 : 返回业务数据即可
        return $business;
    }



     protected function index($inputData, CourseOnlineModel $courseOnlineModel)
     {
        // 定义业务数据
        $business = [];

        try {

            // 开始业务

        } catch (ServiceException $e) {

            // 失败 : 响应到前端
            return responseJsonOfFailure([], $e->getMessage(), true);
        }

        // 完成业务数据的存放
        $business['res'] = [];

        // 成功 : 返回业务数据即可
        return $business;
     }

}