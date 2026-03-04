<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait DeleteTrait 
{
    public function destroy($id):JsonResponse {

        $result = $this->service->destroy($id);

        return ApiResponse::success(
            new $this->resource($result),
            "Address deleted successfully",
            200
        );
    }
}
