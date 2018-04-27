<?php

namespace workflowOfAdmin\moduleOfTest\Output;

use workflowFoundation\Output\BaseFilter;


// 过滤
class TestFilter extends BaseFilter
{


    // 方法必须为protected
    // 参数名必须为 $outputData
    protected function dummyMethod($outputData)
    {

        $outputData['extra'] = "这是一条额外的业务数据";

        return $outputData;
    }

}