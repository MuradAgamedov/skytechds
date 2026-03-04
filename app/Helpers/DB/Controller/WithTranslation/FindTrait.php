<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FindTrait 
{
    public function show($result) : JsonResponse {
        $result = $this->service->find($result);

        return ApiResponse::success(
            new $this->resource($result),
            $this->messagesModel::FETCHED,
            200
        );
    }
}
