<?php


namespace workflowFoundation\Business\DirectorRelied\User;



interface UserServiceImpl
{

    /**
     * 获取一个用户的信息
     * @param $table
     * @param array $where
     * @return mixed
     */
    public function getOne($table, $where = []);

    /**
     * 获取许多用户的信息
     * @param $table
     * @param array $where
     * @return mixed
     */
    public function getMany($table, $where = []);
}