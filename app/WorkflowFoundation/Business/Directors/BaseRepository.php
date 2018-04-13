<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/4/2
 * Time: 下午11:01
 */

namespace App\WorkflowFoundation\Business\Directors;


class BaseRepository
{

    private $model = null;

    function __construct()
    {
        $this->model = new static();
    }

    public function __call()
    {

    }

}