<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait DeleteTrait {
    public function destroy($id):JsonResponse {
        $email = $this->service->destroy($id);

        return ApiResponse::success(
            new $this->resource($email),
            $this->messagesModel::DELETED,
            200
        );
    }
}