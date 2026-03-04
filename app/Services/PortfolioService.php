<?php

namespace App\Services;

use App\Interfaces\Services\PortfolioServiceInterface;
use App\Repositories\PortfolioRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioService implements PortfolioServiceInterface
{
    public function __construct(public PortfolioRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data)
    {

        return $this->repository->store($data);
    }

    public function update($portfolio, array $data)
    {
        return $this->repository->update($portfolio, $data);
    }

    public function destroy($portfolio)
    {
        return $this->repository->destroy($portfolio);
    }

    public function find($portfolio)
    {
        return $this->repository->find($portfolio);
    }
}
