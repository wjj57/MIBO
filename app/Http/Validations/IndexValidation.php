<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/30
 * Time: 下午11:54
 */

namespace App\Http\Validations;

use \Illuminate\Support\Facades\Validator;

class IndexValidation extends BaseValidation
{


    public function handle($data)
    {

        $validator = Validator::make($data, [

            // 任务 : 完成数据的验证 , 验证通过以后 , 将数据返回( 可以做事后处理 )
            // 开始...

            'name' => ['required',]

        ]);


        // 可以在验证后做相关处理
        // $data = $this->after($data);


        if (!$validator->fails()) {

            throw new \Exception();
        }

        return $data;
    }


    protected function after($data)
    {

        // 可选
        // 任务 : 验证后 , 对数据做一些处理 , 如转义等

        return $data;
    }


}