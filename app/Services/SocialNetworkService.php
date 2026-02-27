<?php

namespace App\Services;

use App\Interfaces\Services\SocialNetworkServiceInterface;
use App\Models\SocialNetwork;
use App\Repositories\SocialNetworkRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SocialNetworkService implements SocialNetworkServiceInterface {
    public function __construct(public SocialNetworkRepository $repository)
    {
    }

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): SocialNetwork {
        return $this->repository->store($data);
    }

    public function update(SocialNetwork $socialNetwork, array $data): SocialNetwork {
        return $this->repository->update($socialNetwork, $data);
    }

    public function destroy(SocialNetwork $socialNetwork) : SocialNetwork {
        return $this->repository->destroy($socialNetwork);
    }

    public function find(SocialNetwork $socialNetwork) : SocialNetwork {
        return $this->repository->find($socialNetwork);
    }

}