<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::get('/test/{id}',function(){

    // 返回当前请求对象的路由
    return request()->route();

    // 返回当前请求对象的路由参数 : id
    return request()->route('id');
});


/*----------循环 workflow 目录并加载不同模块下的 route.php------------*/
function myScan($file)
{

    // 只有当前目录是 workflowOf目录 或者 moduleOf目录 时才会遍历目录
    if (is_dir($file) && (substr(basename($file), 0, 10) === "workflowOf" || substr(basename($file), 0, 8) === "moduleOf")) {

        $file_arr = scandir($file);
        foreach ($file_arr as $key => $value) {

            if ($value !== '.' && $value !== '..') {

                myScan($file . DIRECTORY_SEPARATOR . $value);
            }
        }

    } else {

        // 只有是 route.php 文件时 , 才会加载
        if (is_file($file) && basename($file) === 'route.php') {

            include_once $file;
        }
    }
}

myScan(base_path('workflowOfSinger'));
myScan(base_path('workflowOfAdmin'));
/*----------循环 workflow 目录并加载不同模块下的 route.php------------*/


