<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait CreateTrait 
{
    public function store():JsonResponse {
        $request = app($this->create_request);
        $result = $this->service->store($request->validated());

        return ApiResponse::success(
            new $this->resource($result),
            "Address added successfully",
            200
        );
    }
}
