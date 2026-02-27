<?php

namespace App\Interfaces\Repositories;

use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;

interface MapRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Map;
    public function update(Map $map, array $data):Map;
    public function destroy(Map $map):Map;
    public function find(Map $map);
}