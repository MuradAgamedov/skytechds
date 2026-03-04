<?php

namespace App\Services;

use App\Interfaces\Services\TestimonialServiceInterface;
use App\Repositories\TestimonialRepository;
use App\Services\Base\BaseService;

class TestimonialService extends BaseService implements TestimonialServiceInterface
{
    public function __construct(public TestimonialRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
