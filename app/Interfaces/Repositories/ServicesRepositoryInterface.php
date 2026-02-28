<?php

namespace App\Interfaces\Repositories;

use App\Models\BlogCategory\BlogCategory;
use App\Models\Services\Service;
use Illuminate\Pagination\LengthAwarePaginator;

interface ServicesRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Service;
    public function update(Service $service, array $data): Service;
    public function destroy(Service $service): Service;
    public function find(Service $service);
}
