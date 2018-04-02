<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 上午12:01
 */

namespace App\Workflow\Managers\Services\Common\Upload;


class UploadVideoService
{

    protected function before()
    {
        Memory::set('workflow.status', UploadVideoService::class);
    }

    public function handle()
    {

        $data = [

            'count' => 1,
            'imgs' => [

                ['name' => '1.jpg', 'size' => '2.3k', 'time' => 32324232]

            ]
        ];

        // 上传成功后 , 会存入相关的数据
        Memory::set('workflow.business.data.UploadVideoService', $data);
    }
}