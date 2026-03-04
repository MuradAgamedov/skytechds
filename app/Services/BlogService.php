<?php

namespace App\Services;

use App\Interfaces\Services\BlogServiceInterface;
use App\Repositories\BlogRepository;
use App\Services\Base\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{
    public function __construct(public BlogRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
