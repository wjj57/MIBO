<?php

use App\WorkflowFoundation\Shared\Memory\Memory;


// 辅助函数 : 响应

if (!function_exists('makeErrorCode')) {

    function makeErrorCode()
    {
        return rand(1000, 9000);
    }
}

if (!function_exists('responseJsonOfSuccess')) {

    /**
     * 响应成功到客户端
     */
    function responseJsonOfSuccess($data = [], $code = 0, $msg = '成功', $link = '未知环节', $status = 200, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {

        setExceptionData($data, $code, $msg, $link, $status, $headers, $options);
        throw new \Exception('');
    }
}

if (!function_exists('responseJsonOfFailure')) {

    /**
     * 响应失败到客户端
     */
    function responseJsonOfFailure($data = [], $code = 4444, $msg = '失败', $link = '未知环节', $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        // 如果 code 为 true 则表示生成一个随机码作为响应吗
        if ($code === true) {

            $code = makeErrorCode();
        } else if ($code === false) {

            $code = 4444;
        }

        setExceptionData($data, $code, $msg, $link, $status, $headers, $options);
        throw new \Exception('');
    }
}

if (!function_exists('responseJsonOfSystemError')) {

    /**
     * 报告错误到客户端 : 如果当前是 debug 模式 , 则输出 msg 错误信息 , 否则只报告失败
     */
    function responseJsonOfSystemError($data = [], $code = 4444, $msg = '失败', $link = '未知环节', $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        if ($code === true) {

            $code = makeErrorCode();
        } else if ($code === false) {

            $code = 4444;
        }

        if (!config('app.debug')) {
            $msg = '失败';
        }
        setExceptionData($data, $code, $msg, $link, $status, $headers, $options);
        throw new \Exception('');
    }
}

if (!function_exists('setExceptionData')) {

    function setExceptionData($data = [], $code = 4444, $msg = '失败', $link = '未知环节', $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        Memory::set([

            'workflow.exception.data' => $data,
            'workflow.exception.code' => $code,
            'workflow.exception.msg' => $msg,
            'workflow.exception.link' => $link, // workflow 的哪一个环节出错了


            'workflow.exception.status' => $status,
            'workflow.exception.headers' => $headers,
            'workflow.exception.options' => $options,
        ]);
    }
}

if (!function_exists('getExceptionData')) {

    function getExceptionData()
    {
        return [

            Memory::get('workflow.exception.data'),
            Memory::get('workflow.exception.code'),
            Memory::get('workflow.exception.msg'),
            Memory::get('workflow.exception.link'),

            Memory::get('workflow.exception.status'),
            Memory::get('workflow.exception.headers'),
            Memory::get('workflow.exception.options'),
        ];
    }
}