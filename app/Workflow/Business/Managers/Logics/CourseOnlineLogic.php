<?php

namespace App\Workflow\Business\Managers\Logics;

// 逻辑部分( 有输入和输出 , 逻辑又充当黑匣子 )
class CourseOnlineLogic extends BaseLogic
{

    // 逻辑 : 要求必须有输入和输出
    protected function pay($step, $input)
    {
        switch ($step) {

            // 第一步 , 判断是否可以购买
            case 1 :

                // 判断价格
                if ($input['money'] < 100) {

                    // 不能购买
                    return responseJsonOfFailure([], 4444, '您不能购买');
                }

                // 判断用户名
                if ($input['name'] !== 'lvsi') {

                    // 不能购买
                    return responseJsonOfFailure([], 4444, '只有lvsi可以购买');
                }

                // 判断年龄
                if ($input['name'] < 18) {

                    // 不能购买
                    return responseJsonOfFailure([], 4444, '18岁以上才可以购买');
                }
                // ........................

                return $production;
                break;

            case 2 :

                return $production;
                break;

            default :
                throw new \Exception();
                break;
        }
    }

}