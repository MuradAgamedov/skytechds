<?php

namespace App\Services;

use App\Interfaces\Services\ServiceServiceInterface;
use App\Models\Blog\Blog;
use App\Models\Services\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceService implements ServiceServiceInterface
{
    public function __construct(public ServiceRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Service
    {
        return $this->repository->store($data);
    }

    public function update(Service $service, array $data): Service
    {
        return $this->repository->update($service, $data);
    }

    public function destroy(Service $service): Service
    {
        return $this->repository->destroy($service);
    }

    public function find(Service $service): Service
    {
        return $this->repository->find($service);
    }
}
