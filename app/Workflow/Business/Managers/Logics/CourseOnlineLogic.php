<?php

namespace App\Workflow\Business\Managers\Logics;

// 逻辑部分
class CourseOnlineLogic extends BaseLogic
{


    // 逻辑 : 要求必须有输入产量和输出产量
    public function pay($step, $production)
    {
        switch ($step) {

            case 1 :

                if ($production['sad'] = $production['sad']) {


                }
                else{

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