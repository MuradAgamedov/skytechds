<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SocialNetworkRepositoryInterface;
use App\Models\SocialNetwork;
use Illuminate\Pagination\LengthAwarePaginator;

class SocialNetworkRepository implements SocialNetworkRepositoryInterface{
    public function __construct(public SocialNetwork $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):SocialNetwork {
        return $this->model::create($data);
    }
    public function update(SocialNetwork $socialNetwork, array $data):SocialNetwork {
        $socialNetwork->update($data);
        $socialNetwork->refresh();
        return $socialNetwork;
    }
    public function destroy(SocialNetwork $socialNetwork):SocialNetwork {
        $socialNetwork->delete();
        return $socialNetwork;
    }
    public function find(SocialNetwork $socialNetwork) {
        return $socialNetwork;
    }
}