<?php

namespace App\Interfaces\Repositories;

use App\Models\SocialNetwork;
use Illuminate\Pagination\LengthAwarePaginator;

interface SocialNetworkRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):SocialNetwork;
    public function update(SocialNetwork $socialNetwork, array $data):SocialNetwork;
    public function destroy(SocialNetwork $socialNetwork):SocialNetwork;
    public function find(SocialNetwork $socialNetwork);
}