<?php

namespace App\Services;

use App\Interfaces\Services\ServiceServiceInterface;

use App\Repositories\ServiceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceService implements ServiceServiceInterface
{
    public function __construct(public ServiceRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    public function update($service, array $data)
    {
        return $this->repository->update($service, $data);
    }

    public function destroy($service)
    {
        return $this->repository->destroy($service);
    }

    public function find($service)
    {
        return $this->repository->find($service);
    }
}
