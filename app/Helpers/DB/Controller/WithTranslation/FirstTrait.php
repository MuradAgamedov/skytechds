<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FirstTrait 
{
    public function index():JsonResponse {
        $result = $this->service->first();

        return ApiResponse::success(
            new $this->resource($result),
            "Address added successfully",
            200
        );
    }
}
