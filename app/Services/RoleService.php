<?php

namespace App\Services;

use App\Interfaces\Services\RoleServiceInterface;
use App\Repositories\RoleRepository;
use App\Services\Base\BaseService;

class RoleService extends BaseService implements RoleServiceInterface {
    public function __construct(public RoleRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}