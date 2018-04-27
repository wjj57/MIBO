<?php

namespace workflowFoundation\Business;


class BaseRepository
{

    private $model = null;

    function __construct()
    {
        $this->model = new static();
    }
}