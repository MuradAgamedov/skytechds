<?php

namespace App\Interfaces\Services;

use App\Models\Services\Service;
use Illuminate\Pagination\LengthAwarePaginator;

interface ServiceServiceInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Service;
    public function update(Service $service, array $data): Service;
    public function destroy(Service $service): Service;
    public function find(Service $service);
}
