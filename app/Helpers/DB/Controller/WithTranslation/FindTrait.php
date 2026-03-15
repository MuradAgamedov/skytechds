<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FindTrait
{
    public function show($result) : JsonResponse {
        $this->authorize('view', $this->model);
        $relations = [];
        if (method_exists($this, 'getEagerLoadRelations')) {
            $relations = $this->getEagerLoadRelations();
        }
        $result = $this->service->find($result, $relations);

        return ApiResponse::success(
            $result ? new $this->resource($result) : null,
            $this->messagesModel::FETCHED,
            200
        );
    }
}
