<?php

namespace App\Repositories\Base\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\DB\WithoutTranslation\CreateHelper;
use App\Helpers\DB\WithoutTranslation\DeleteHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Helpers\DB\WithoutTranslation\UpdateHelper;

class BaseCrudRepository 
{
    use CreateHelper, UpdateHelper, DeleteHelper, ReadHelper, FindHelper;
    protected Model $model;
}
