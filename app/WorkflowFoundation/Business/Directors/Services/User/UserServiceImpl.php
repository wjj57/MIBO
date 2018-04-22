<?php


namespace App\WorkflowFoundation\Business\Directors\Services\User;


interface UserServiceImpl
{

    public function get($table, $where = []);

    public function getMany($table, $where = []);
}