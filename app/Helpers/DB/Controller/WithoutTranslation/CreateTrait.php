<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait CreateTrait {
    public function store():JsonResponse {
        $this->authorize('create', $this->model);
        $request = app($this->create_request);
        $result = $this->service->store($request->validated());

        return ApiResponse::success(
            new $this->resource($result),
            $this->messagesModel::CREATED,
            200
        );
    }
}
