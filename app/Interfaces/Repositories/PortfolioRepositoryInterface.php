<?php

namespace App\Interfaces\Repositories;

use App\Models\Portfolio\Portfolio;
use Illuminate\Pagination\LengthAwarePaginator;

interface PortfolioRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Portfolio;
    public function update(Portfolio $portfolio, array $data): Portfolio;
    public function destroy(Portfolio $portfolio): Portfolio;
    public function find(Portfolio $portfolio);
}
