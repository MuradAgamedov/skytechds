<?php

namespace App\Services;

use App\Interfaces\Services\MapServiceInterface;
use App\Repositories\MapRepository;
use App\Services\Base\BaseService;

class MapService extends BaseService implements MapServiceInterface {
    public function __construct(public MapRepository $main_repository)
    {
        $this->repository=$main_repository;
    }

}