<?php

namespace App\Services;

use App\Helpers\DB\Services\FirstTrait;
use App\Helpers\DB\Services\UpdateTrait;

use App\Interfaces\Services\AboutServiceInterface;

use App\Repositories\AboutRepository;

class AboutService implements AboutServiceInterface {
    use FirstTrait, UpdateTrait;
    public function __construct(public AboutRepository $repository)
    {
    }

    public function update($about, array $data) {
        return $this->repository->update($about, $data);
    }

    public function first()  {
        return $this->repository->first();
    }
}