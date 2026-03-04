<?php

namespace App\Services;

use App\Interfaces\Services\LanguageServiceInterface;
use App\Repositories\LanguageRepository;
use App\Services\Base\BaseService;

class LanguageService extends BaseService implements LanguageServiceInterface
{
    public function __construct(public LanguageRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}
