<?php

namespace App\Services;

use App\Interfaces\Services\DictionaryServiceInterface;
use App\Repositories\DictionaryRepository;
use App\Services\Base\BaseService;

class DictionaryService extends BaseService implements DictionaryServiceInterface {
    public function __construct(public DictionaryRepository $main_repository)
    {
        $this->repository=$main_repository;
    }
}