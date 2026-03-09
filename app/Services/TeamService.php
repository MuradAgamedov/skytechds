<?php

namespace App\Services;

use App\Interfaces\Services\TeamServiceInterface;
use App\Repositories\TeamRepository;
use App\Services\Base\BaseService;

class TeamService extends BaseService implements TeamServiceInterface {
    public function __construct(public TeamRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
    
}