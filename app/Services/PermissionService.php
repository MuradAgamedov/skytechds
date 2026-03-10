<?php

namespace App\Services;

use App\Interfaces\Services\PermissionServiceInterface;
use App\Repositories\PermissionRepository;
use App\Services\Base\BaseService;

class PermissionService extends BaseService implements PermissionServiceInterface {
    public function __construct(public PermissionRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}