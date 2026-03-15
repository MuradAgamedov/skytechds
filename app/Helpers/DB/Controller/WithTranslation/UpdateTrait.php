<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait UpdateTrait
{
    public function update($id):JsonResponse {
        $this->authorize('update', $this->model);
        $request = app($this->update_request);
        $result = $this->service->update($id, $request->validated());
        return ApiResponse::success(
            new $this->resource($result),
            $this->messagesModel::UPDATED,
            200
        );
    }
}
