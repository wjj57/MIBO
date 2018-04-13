<?php


namespace App\WorkflowFoundation\Business\Directors\FlowControl;

// 可连续的流程控制
class SeriallyFlowControl extends FlowControl
{

    // 开始
    public static function into()
    {

        // 可连续的流程
        // 无论中间发生什么意外或错误,都会继续向下执行

    }

    // 下一步
    public static function next()
    {


    }

    public static function back()
    {


    }

    public static function out()
    {

        if () {

            if () {

            } else {


            }
        } else {

        }

        if(true){

            SeriallyFlowControl::ifInject($condition, $data, function(){

            });
            SeriallyFlowControl::elseInject();
        }


        SeriallyFlowControl::elseInject();

    }

}

