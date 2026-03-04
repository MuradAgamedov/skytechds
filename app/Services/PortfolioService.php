<?php

namespace App\Services;

use App\Interfaces\Services\PortfolioServiceInterface;
use App\Repositories\PortfolioRepository;
use App\Services\Base\BaseService;

class PortfolioService extends BaseService implements PortfolioServiceInterface
{
    public function __construct(public PortfolioRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
