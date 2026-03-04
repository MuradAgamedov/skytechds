<?php

namespace App\Services;

use App\Interfaces\Services\AddressServiceInterface;
use App\Repositories\AddressRepository;
use App\Services\Base\BaseService;

class AddressService extends BaseService implements AddressServiceInterface {
    public function __construct(public AddressRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
    
}