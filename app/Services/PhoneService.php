<?php

namespace App\Services;

use App\Interfaces\Services\PhoneServiceInterface;
use App\Repositories\PhoneRepository;
use App\Services\Base\BaseService;

class PhoneService extends BaseService implements PhoneServiceInterface {
    public function __construct(public PhoneRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}