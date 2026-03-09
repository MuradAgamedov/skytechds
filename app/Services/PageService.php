<?php

namespace App\Services;

use App\Interfaces\Services\PageServiceInterface;
use App\Repositories\PageRepository;
use App\Services\Base\BaseService;

class PageService extends BaseService implements PageServiceInterface {
    public function __construct(public PageRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}