<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ReadTrait {
    public function index():JsonResponse {
        $results = $this->service->getWidthPagination();

        return ApiResponse::success(
            $this->resource::collection($results),
            "Emails fetched successfully",
            200
        );
    }
}