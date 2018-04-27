<?php


// 辅助函数 : 响应

use workflowFoundation\Shared\Memory\Memory;

if (!function_exists('makeErrorCode')) {

    function makeErrorCode()
    {
        return rand(1000, 9000);
    }
}

if (!function_exists('responseJsonOfSuccess')) {

    /**
     * 响应成功到客户端
     * @param data array
     * @param msg  string
     * @param code int
     */
    function responseJsonOfSuccess($data = [], $msg = '成功', $code = 0, $status = 200, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {

        setResponseData($data, $msg, $code, $status, $headers, $options);
        throw new \Exception("成功");
    }
}

if (!function_exists('responseJsonOfFailure')) {

    /**
     * 响应失败到客户端
     * @param data array
     * @param msg  string
     * @param code int
     */
    function responseJsonOfFailure($data = [], $msg = '失败', $code = 4444, $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        // 如果 code 为 true 则表示生成一个随机码作为响应吗
        if ($code === true) {

            $code = makeErrorCode();
        } else if ($code === false) {

            $code = 4444;
        }

        setResponseData($data, $msg, $code, $status, $headers, $options);
        throw new \Exception($msg);
    }
}

if (!function_exists('responseJsonOfSystemError')) {

    /**
     * 报告错误到客户端 : 如果当前是 debug 模式 , 则输出 msg 错误信息 , 否则只报告失败
     * @param data array
     * @param msg  string
     * @param code int
     */
    function responseJsonOfSystemError($data = [], $msg = '失败', $code = 4444, $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        if ($code === true) {

            $code = makeErrorCode();
        } else if ($code === false) {

            $code = 4444;
        }

        if (!config('app.debug')) {
            $msg = '失败';
        }
        setResponseData($data, $msg, $code, $status, $headers, $options);
        throw new \Exception($msg);
    }
}

if (!function_exists('setResponseData')) {

    function setResponseData($data = [], $msg = '失败', $code = 4444, $status = 400, array $headers = [], $options = JSON_UNESCAPED_UNICODE)
    {
        Memory::set([

            'workflow.response.enable' => true,
            'workflow.response.data' => $data,
            'workflow.response.code' => $code,
            'workflow.response.msg' => $msg,

            'workflow.response.status' => $status,
            'workflow.response.headers' => $headers,
            'workflow.response.options' => $options,
        ]);
    }
}

if (!function_exists('enableToResponse')) {

    function enableToResponse()
    {

        return (Memory::has('workflow.response.enable') && Memory::get('workflow.response.enable') === true) ? true : false;
    }
}

if (!function_exists('responseUnexpectedException')) {

    function responseUnexpectedException($e)
    {

        $msg = (config('app.debug')) ? $e->getMessage() : '失败';

        return response()->json([

            'code' => makeErrorCode(),
            'msg' => $msg,
            'data' => [],
        ]);

    }
}

if (!function_exists('getResponseData')) {

    function getResponseData()
    {
        return [

            Memory::get('workflow.response.enable'),
            Memory::get('workflow.response.data'),
            Memory::get('workflow.response.code'),
            Memory::get('workflow.response.msg'),

            Memory::get('workflow.response.status'),
            Memory::get('workflow.response.headers'),
            Memory::get('workflow.response.options'),
        ];
    }
}