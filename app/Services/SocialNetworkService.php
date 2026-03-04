<?php

namespace App\Services;

use App\Interfaces\Services\SocialNetworkServiceInterface;
use App\Repositories\SocialNetworkRepository;
use App\Services\Base\BaseService;

class SocialNetworkService extends BaseService implements SocialNetworkServiceInterface {
    public function __construct(public SocialNetworkRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}