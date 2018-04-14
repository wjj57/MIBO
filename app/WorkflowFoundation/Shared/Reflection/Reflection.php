<?php

namespace App\WorkflowFoundation\Shared\Reflection;

use App\WorkflowFoundation\Shared\Memory\Memory;
use ReflectionMethod;


class Reflection
{
    /**
     * 为未知类型的形参生成实参
     * @param $name string 形参名称
     * @return mixed
     */
    public static function forUnknownTypeCreateActualParameter($name)
    {
        switch ($name) {

            // 输入数据
            case 'inputData' :
                return Memory::get('workflow.input.data');
                break;

            // 业务数据
            case 'serviceData' :
                return Memory::get('workflow.business.data.portionOfService');
                break;

            // 输出数据
            case 'outputData' :
                return Memory::get('workflow.output.data');
                break;

            default:
                return responseJsonOfSystemError([], 4444, $name . '是未知类型的形参,无法为它生成实参', 'reflection');
                break;
        }
    }

    /**
     * 为 $class 类的 $method 方法创建实参数组
     * @param $class string 类名
     * @param $method string 类的方法
     * @return array
     */
    public static function forMethodCreateActualParameterArr($class, $method)
    {
        // 先判断类和类中的方法是否存在
        if (!class_exists($class) || !method_exists(new $class(), $method)) {

            return responseJsonOfSystemError([], 4444, $class . '类不存在或者类中不存在' . $method . '方法');
        }

        // 反射出这个 $class 类的 $method 方法的形参数组
        $parameters = (new ReflectionMethod($class, $method))->getParameters();

        // 定义实参数组 ( 调用依赖的方法时需要传递的参数 )
        $actualParameterArr = [];

        // 循环形参数组
        foreach ($parameters as $parameter) {

            // 依次获取每个参数的类型和名称
            $type = $parameter->getType(); // 参数类型
            $name = $parameter->getName(); // 参数名称

            // 形参的类型未知
            if (is_null($type)) {

                $actualParameterArr[] = self::forUnknownTypeCreateActualParameter($name);
            }

            // 判断 type 类型是否存在
            $type = strval($type);
            if (!class_exists($type)) {

                return responseJsonOfSystemError([], 4444, $type . '类型不存在,无法创建此类型的对象', 'reflection');
            }

            // 创建 type 类型对象并压入实参数组
            $actualParameterArr[] = new $type();
        }

        return $actualParameterArr;
    }

}