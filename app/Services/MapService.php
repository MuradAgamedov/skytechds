<?php

namespace App\Services;

use App\Interfaces\Services\MapServiceInterface;
use App\Models\Map;
use App\Repositories\MapRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class MapService implements MapServiceInterface {
    public function __construct(public MapRepository $repository)
    {
    }

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Map {
        return $this->repository->store($data);
    }

    public function update(Map $phone, array $data): Map {
        return $this->repository->update($phone, $data);
    }

    public function destroy(Map $phone) : Map {
        return $this->repository->destroy($phone);
    }

    public function find(Map $phone) : Map {
        return $this->repository->find($phone);
    }

}