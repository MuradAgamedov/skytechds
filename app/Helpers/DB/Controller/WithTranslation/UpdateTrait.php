<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait UpdateTrait 
{
    public function update($id):JsonResponse {
        $request = app($this->update_request);
        $result = $this->service->update($id, $request->validated());
        return ApiResponse::success(
            new $this->resource($result),
            "Address updated successfully",
            200
        );
    }
}
