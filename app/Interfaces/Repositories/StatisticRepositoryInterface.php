<?php

namespace App\Interfaces\Repositories;

use App\Models\Statistics\Statistic;
use Illuminate\Pagination\LengthAwarePaginator;

interface StatisticRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $statistic): Statistic;
    public function update(Statistic $statistic, array $data): Statistic;
    public function destroy(Statistic $statistic): Statistic;
    public function find(Statistic $statistic);
}
