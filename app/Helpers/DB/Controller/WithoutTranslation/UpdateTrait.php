<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait UpdateTrait {
    public function update($id):JsonResponse {
        $this->authorize('update', $this->model);
        $request = app($this->update_request);

        $with = $this->with ?? [];
        $model = $this->service->find($id, $with);
        $model = $this->service->update($model, $request->validated());
        return ApiResponse::success(
            new $this->resource($model),
            $this->messagesModel::UPDATED,
            200
        );
    }
}
