<?php

namespace App\Services;

use App\Interfaces\Services\StatisticServiceInterface;
use App\Repositories\StatisticRepository;
use App\Services\Base\BaseService;

class StatisticService extends BaseService implements StatisticServiceInterface {
    public function __construct(public StatisticRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}