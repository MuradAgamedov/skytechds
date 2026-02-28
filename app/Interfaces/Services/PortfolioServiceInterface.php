<?php

namespace App\Interfaces\Services;

use App\Models\Portfolio\Portfolio;
use Illuminate\Pagination\LengthAwarePaginator;

interface PortfolioServiceInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Portfolio;
    public function update(Portfolio $portfolio, array $data): Portfolio;
    public function destroy(Portfolio $portfolio): Portfolio;
    public function find(Portfolio $portfolio);
}
