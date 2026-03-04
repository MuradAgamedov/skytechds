<?php

namespace App\Services;

use App\Interfaces\Services\ServiceServiceInterface;

use App\Repositories\ServiceRepository;
use App\Services\Base\BaseService;

class ServiceService extends BaseService implements ServiceServiceInterface
{
    public function __construct(public ServiceRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
