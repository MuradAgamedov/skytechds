<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ReadHelper
{
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
}
