<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // 如果可以响应
        if (enableToResponseNormally()) {

            // 获取响应数据
            list($enable, $data, $code, $msg, $status, $headers, $options) = getResponseData();
            return response()->json([

                'code' => $code,
                'msg' => $msg,
                'data' => $data,
            ], $status, $headers, $options);
        }

        // 不能响应 , 肯定是发生了一些不可预料的异常/错误
        return responseWithUnexpectedException($exception);
        // return parent::render($request, $exception);
    }
}
