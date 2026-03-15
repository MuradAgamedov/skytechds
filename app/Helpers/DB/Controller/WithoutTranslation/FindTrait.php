<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FindTrait {
    public function show($id) {
        $this->authorize('view', $this->model);
         $email = $this->service->find($id);

        return ApiResponse::success(
            $email ? new $this->resource($email) : null,
            $this->messagesModel::FETCHED,
            200
        );
    }
}
