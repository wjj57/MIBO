<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 18/3/30
 * Time: 下午11:54
 */

namespace App\Http\Repository;

use App\Models\Index;

class IndexRepository extends BaseRepository
{

    protected $model = null;

    function __construct(Index $model)
    {

        $this->model = $model;
    }




}