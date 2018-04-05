<?php
/**
 * Created by PhpStorm.
 * User: Lvsi-China
 * Date: 18/4/5
 * Time: 下午2:23
 */

// 辅助函数 : 响应

if (!function_exists('responseJsonSuccessfully')) {

    /**
     * 响应成功到客户端
     * @param array $data
     * @param int $code
     * @param string $msg
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    function responseJsonSuccessfully($data = [], $code = 0, $msg = '成功', $status = 200, array $headers = [], $options = 0)
    {

        return response()->json([

            'code' => $code,
            'msg' => $msg ,
            'data' => $data,
        ], $status, $headers, $options);
    }
}

if (!function_exists('responseJsonUnsuccessfully')) {

    /**
     * 响应失败到客户端
     * @param array $data
     * @param int $code
     * @param string $msg
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    function responseJsonUnsuccessfully($data = [], $code = 4444, $msg = '失败', $status = 400, array $headers = [], $options = 0)
    {
        return response()->json([

            'code' => $code,
            'msg' => $msg ,
            'data' => $data,
        ], $status, $headers, $options);
    }
}
