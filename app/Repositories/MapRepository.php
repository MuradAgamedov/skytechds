<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MapRepositoryInterface;
use App\Models\Map;
use App\Repositories\Base\WithoutTranslation\BaseCrudRepository;

class MapRepository extends BaseCrudRepository implements MapRepositoryInterface{
    public function __construct(Map $model)
    {
        $this->model = $model;
    }
}