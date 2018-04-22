<?php


namespace App\WorkflowFoundation\Business\Directors\Services\User;

use App\WorkflowFoundation\Business\Directors\BaseService;


class UserService extends BaseService implements UserServiceImpl
{

    public function get($table, $where = [])
    {
        if($where['id']===19){

            return [

                'name' => 'lvsi',
                'money' => 9999999
            ];
        }
        return [

            'name' => 'lvsi',
            'money' => 99
        ];
    }

    public function getMany($table, $where = [])
    {
    }
}