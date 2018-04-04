<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/2
 * Time: 上午10:08
 */

namespace App\Workflow\Managers\Services\Common\Captcha;


use App\Workflow\Business\Managers\Services\BaseService;
use App\Workflow\Managers\Queues\SendSMSQueue;


// 手机验证码服务 ( Redis + Queue )
class PhoneCaptchaService extends BaseService
{

    // Redis 内部的



    // 判断是否可以发送验证码
    protected function processIsAbleToSend()
    {

        return true; // return false
    }

    // 生成验证码
    protected function processGenerateCaptcha()
    {

        return rand(15555555,99999999) ;
    }

    // 发送验证码短信
    protected function processSend($phone)
    {
        // 使用 SendEMSQueue 队列
        pushJobIntoQueue(['phone' => $phone,], SendSMSQueue::class);

        //
    }

    // 验证验证码是否正确
    protected function processCheck($phone , $captcha)
    {

        // 根据 phone 从 redis 中读取 captcha 并与 $captcha 对比
        return true ; // return false
    }



}