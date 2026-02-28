<?php

namespace App\Interfaces\Repositories;

use App\Models\BlogCategory\BlogCategory;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogCategoryRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): BlogCategory;
    public function update(BlogCategory $blogCategory, array $data): BlogCategory;
    public function destroy(BlogCategory $blogCategory): BlogCategory;
    public function find(BlogCategory $blogCategory);
}
