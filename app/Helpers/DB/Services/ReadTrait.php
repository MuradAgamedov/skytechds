<?php

namespace App\Helpers\DB\Services;

use Illuminate\Pagination\LengthAwarePaginator;

trait ReadTrait {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
}