<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FindTrait {
    public function show($id) {
        $this->authorize('view', $this->model);
        $with = $this->with ?? [];
        $email = $this->service->find($id, $with);

        return ApiResponse::success(
            $email ? new $this->resource($email) : null,
            $this->messagesModel::FETCHED,
            200
        );
    }
}
