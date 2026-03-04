<?php

namespace App\Services;

use App\Interfaces\Services\FaqServiceInterface;
use App\Repositories\FaqRepository;
use App\Services\Base\BaseService;

class FaqService extends BaseService implements FaqServiceInterface {
    public function __construct(public FaqRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}