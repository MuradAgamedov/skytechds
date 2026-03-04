<?php

namespace App\Interfaces\Repositories\Base;

use Illuminate\Pagination\LengthAwarePaginator;

interface ReadRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
}