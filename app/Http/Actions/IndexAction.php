<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/30
 * Time: 下午11:54
 */

namespace App\Http\Actions;


use App\Http\Validations\IndexValidation;

class IndexAction extends BaseAction
{

    protected $validation = null;

    function __construct(IndexValidation $validation)
    {

        $this->validation = $validation;
    }


    public function handle()
    {

        return $this->validation->handle([

            // 任务 : 完成数据的拉取 ( 禁止做任何验证 )
            // 说明 : 将数据一个一个获取的目的是更清楚地知道都需要哪些数据
            // 开始...



        ]);
    }


}