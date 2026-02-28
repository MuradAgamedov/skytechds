<?php

namespace App\Services;

use App\Interfaces\Services\BlogServiceInterface;
use App\Models\Blog\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogService implements BlogServiceInterface
{
    public function __construct(public BlogRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Blog
    {

        return $this->repository->store($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        return $this->repository->update($blog, $data);
    }

    public function destroy(Blog $blog): Blog
    {
        return $this->repository->destroy($blog);
    }

    public function find(Blog $blog): Blog
    {
        return $this->repository->find($blog);
    }
}
