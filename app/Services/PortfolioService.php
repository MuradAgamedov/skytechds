<?php

namespace App\Services;

use App\Interfaces\Services\PortfolioServiceInterface;
use App\Models\Portfolio\Portfolio;
use App\Repositories\PortfolioRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioService implements PortfolioServiceInterface
{
    public function __construct(public PortfolioRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Portfolio
    {

        return $this->repository->store($data);
    }

    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        return $this->repository->update($portfolio, $data);
    }

    public function destroy(Portfolio $portfolio): Portfolio
    {
        return $this->repository->destroy($portfolio);
    }

    public function find(Portfolio $portfolio): Portfolio
    {
        return $this->repository->find($portfolio);
    }
}
