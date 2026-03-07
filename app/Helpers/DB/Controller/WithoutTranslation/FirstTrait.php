<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait First {
    public function first():JsonResponse {
        $results = $this->service->first();

        return ApiResponse::success(
            $results ? new $this->resource($results) : null,
            $this->messagesModel::FETCHED,
            200
        );
    }
}