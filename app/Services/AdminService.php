<?php

namespace App\Services;

use App\Interfaces\Services\AdminServiceInterface;
use App\Repositories\AdminRepository;
use App\Services\Base\BaseService;

class AdminService extends BaseService implements AdminServiceInterface {
    public function __construct(public AdminRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
