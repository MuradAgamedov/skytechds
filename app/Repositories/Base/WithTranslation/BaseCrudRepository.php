<?php

namespace App\Repositories\Base\WithTranslation;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;

class BaseCrudRepository
{
    use CreateHelper, UpdateHelper, DeleteHelper, ReadHelper, FindHelper;
    protected Model $model;
    public function getModel() {
        return $this->model;
    }
}
