<?php

namespace App\Interfaces\Repositories;

use App\Models\Blog\Blog;
use App\Models\BlogCategory\BlogCategory;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Blog;
    public function update(Blog $blog, array $data): Blog;
    public function destroy(Blog $blog): Blog;
    public function find(Blog $blog);
}
