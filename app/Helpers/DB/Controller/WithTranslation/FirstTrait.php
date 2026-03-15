<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FirstTrait
{
    public function index():JsonResponse {
        $this->authorize('viewAny', $this->model);
        $result = $this->service->first();

        return ApiResponse::success(
            $result ? new $this->resource($result) : null,
            $this->messagesModel::FETCHED,
            200
        );
    }
}
