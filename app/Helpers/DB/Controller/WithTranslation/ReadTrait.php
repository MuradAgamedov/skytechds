<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ReadTrait
{
    public function index():JsonResponse {
        $this->authorize('viewAny', $this->model);
        $relations = ['translations'];
        if (method_exists($this, 'getEagerLoadRelations')) {
            $relations = array_merge($relations, $this->getEagerLoadRelations());
        }
        $limit = isset($this->limit) ? $this->limit : 60;
        $results = $this->service->getWidthPagination($relations, $limit);

        return ApiResponse::success(
            $this->resource::collection($results),
            $this->messagesModel::FETCHED,
            200
        );
    }

    protected function getEagerLoadRelations(): array {
        return [];
    }
}
