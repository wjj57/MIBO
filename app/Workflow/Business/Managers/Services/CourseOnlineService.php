<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/3
 * Time: 上午12:06
 */

namespace App\Workflow\Business\Managers\Services;


class CourseOnlineService extends BaseService
{

    // 加工....
    // 这些 processXXX 方法最重要的特征就是 :
    // 输入输出 , 有输入也有输出 , 只有1个输入,也只有1个输出 , 永久都是这样
    protected function processXXXX()
    {

        // 即使不需要返回 , 还是需要显示返回一个 null , 接收处不用变量接收就行
        return null ;
    }

}