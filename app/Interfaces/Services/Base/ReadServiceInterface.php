<?php

namespace App\Interfaces\Services\Base;

use Illuminate\Pagination\LengthAwarePaginator;

interface ReadServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
}