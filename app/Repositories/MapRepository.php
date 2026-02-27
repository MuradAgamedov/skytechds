<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MapRepositoryInterface;
use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;

class MapRepository implements MapRepositoryInterface{
    public function __construct(public Map $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):Map {
        return $this->model::create($data);
    }
    public function update(Map $email, array $data):Map {
        $email->update($data);
        $email->refresh();
        return $email;
    }
    public function destroy(Map $email):Map {
        $email->delete();
        return $email;
    }
    public function find(Map $email) {
        return $email;
    }
}