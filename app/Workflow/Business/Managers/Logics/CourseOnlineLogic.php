<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/2
 * Time: 上午10:20
 */

namespace App\Workflow\Managers\Logics;

// 逻辑部分
class CourseOnlineLogic extends BaseLogic
{


    public static function pay($step, $production)
    {
        switch ($step) {

            case 1 :

                if ($production['sad'] = $production['sad']) {


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