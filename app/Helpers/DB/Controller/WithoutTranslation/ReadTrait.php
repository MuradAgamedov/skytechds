<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ReadTrait {
    public function index():JsonResponse {
        $this->authorize('viewAny', $this->model);
        $with = $this->with ?? [];
        $limit = isset($this->limit) ? $this->limit : 600;
        $results = $this->service->getWidthPagination($with, $limit);

        return ApiResponse::success(
            $this->resource::collection($results),
            $this->messagesModel::FETCHED,
            200
        );
    }
}
