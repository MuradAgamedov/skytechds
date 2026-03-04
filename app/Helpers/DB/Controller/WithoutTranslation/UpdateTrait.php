<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait UpdateTrait {
    public function update($id):JsonResponse {
        $request = app($this->create_request);

        $email = $this->service->find($id, $request->validated());

        return ApiResponse::success(
            new $this->resource($email),
            $this->messagesModel::UPDATED,
            200
        );
    }
}