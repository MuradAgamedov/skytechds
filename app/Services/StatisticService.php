<?php

namespace App\Services;

use App\Interfaces\Services\StatisticServiceInterface;
use App\Models\Statistics\Statistic;
use App\Repositories\StatisticRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StatisticService implements StatisticServiceInterface {
    public function __construct(public StatisticRepository $repository)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Statistic {
        
        return $this->repository->store($data);
    }

    public function update(Statistic $statistic, array $data): Statistic {
        return $this->repository->update($statistic, $data);
    }

    public function destroy(Statistic $statistic) : Statistic {
        return $this->repository->destroy($statistic);
    }

    public function find(Statistic $statistic) : Statistic {
        return $this->repository->find($statistic);
    }
}