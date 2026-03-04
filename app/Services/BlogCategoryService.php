<?php

namespace App\Services;

use App\Interfaces\Services\BlogCategoryServiceInterface;
use App\Repositories\BlogCategoryRepository;
use App\Services\Base\BaseService;

class BlogCategoryService extends BaseService implements BlogCategoryServiceInterface
{
    public function __construct(public BlogCategoryRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
