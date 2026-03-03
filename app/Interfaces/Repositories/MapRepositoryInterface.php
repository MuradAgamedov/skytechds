<?php

namespace App\Interfaces\Repositories;

use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;

interface MapRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data);
    public function update($map, array $data);
    public function destroy($map);
    public function find($map);
}