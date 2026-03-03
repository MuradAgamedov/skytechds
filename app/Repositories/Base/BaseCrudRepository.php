<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class BaseCrudRepository 
{
    protected Model $model;

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    
    public function store(array $data) {
        return $this->model::create($data);
    }

    public function update($model, array $data) {
        $model->update($data);
        $model->refresh();
        return $model;
    }

    public function destroy($model)
    {
        $model->delete();
        return $model;
    }


    public function find($model) {
        return $model;
    }
}
