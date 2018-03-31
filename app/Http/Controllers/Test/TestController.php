<?php

namespace App\Http\Controllers\Test;

use App\Http\Actions\IndexRepository;
use App\Http\Actions\IndexValidation;
use App\Http\Controllers\BaseController;

class TestController extends BaseController
{

    function __construct()
    {

        // 首先进入中间件
        // 中间件主要做 ： 操作权限验证 , Session状态验证 等验证方面的操作
        $this->enterMiddlewares([]) ;
        $this->enterMiddlewaresOnly([]) ;
        $this->enterMiddlewaresExcept([]) ;
    }




    // X-Requested-With:XMLHttpRequest
    public function test(IndexRepository $action)
    {

        // php artisan lvsi:make
        // 键入命令后 :
        // 0、完成各种配置文件的配置( 特别是 redis )
        // 1、分层中需要用到的所有文件全部自动生成
        // 2、自动生成路由
        // 3、生成数据库相关文件 ： factories + migrations + seeds


        // 功能：
        // 1、手机验证码 ：做到只需要调用相关接口就能实现完整操作( 配合redis )，
        // 2、图像验证码 ：... ...
        // 3、各种支付   :
        // 4、第三方登录 :
        //

        // Action 主要做拉取数据操作

        // Validate 主要做验证数据操作

        // Repository 主要做与数据库交互操作

        // Filter 主要做最后数据的过滤操作


        return file('../Controller.php');

    }



    public function test2(IndexRepository $action){

        // 1、Action
        $data = $action -> handle() ;


        // 2、Repository


    }


}
