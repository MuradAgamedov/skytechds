<?php

namespace App\Services;

use App\Helpers\DB\Services\FirstTrait;
use App\Helpers\DB\Services\UpdateTrait;

use App\Interfaces\Services\AllSeoServiceInterface;

use App\Repositories\AllSeoRepository;

class AllSeoService implements AllSeoServiceInterface {
    use FirstTrait, UpdateTrait;
    public function __construct(public AllSeoRepository $repository)
    {
    }

    public function update($all_seo, array $data) {
        return $this->repository->update($all_seo, $data);
    }

    public function first()  {
        return $this->repository->first();
    }
}