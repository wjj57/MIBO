<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/1
 * Time: 上午12:01
 */

namespace App\WorkflowFoundation\Business\Managers\Services\Upload;

use App\Workflow\Memory;

// 上传视频服务
class UploadVideoService
{

    protected function before()
    {
        // 记录当前的 workflow 状态为 UploadVideoService
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

    }
}