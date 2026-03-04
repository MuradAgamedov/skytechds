<?php

namespace App\Services;

use App\Interfaces\Services\AddressServiceInterface;
use App\Repositories\TagRepository;
use App\Services\Base\BaseService;

class TagService extends BaseService implements AddressServiceInterface {
    public function __construct(public TagRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
    
}