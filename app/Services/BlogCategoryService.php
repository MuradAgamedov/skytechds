<?php

namespace App\Services;

use App\Interfaces\Services\BlogCategoryServiceInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogCategoryService implements BlogCategoryServiceInterface
{
    public function __construct(public BlogCategoryRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): BlogCategory
    {

        return $this->repository->store($data);
    }

    public function update(BlogCategory $blogCategory, array $data): BlogCategory
    {
        return $this->repository->update($blogCategory, $data);
    }

    public function destroy(BlogCategory $blogCategory): BlogCategory
    {
        return $this->repository->destroy($blogCategory);
    }

    public function find(BlogCategory $blogCategory): BlogCategory
    {
        return $this->repository->find($blogCategory);
    }
}
