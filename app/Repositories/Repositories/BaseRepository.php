<?php

namespace App\Repositories\Repositories;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BaseInterface;

class BaseRepository extends Controller implements BaseInterface
{
    public function selectAll($model)
    {
       return $model->all();
    }
}
