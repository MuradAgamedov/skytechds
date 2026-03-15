<?php

namespace App\Helpers\DB\Controller\WithTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait DeleteTrait
{
    public function destroy($id):JsonResponse {
        $this->authorize('delete', $this->model);
        $result = $this->service->destroy($id);

        return ApiResponse::success(
            new $this->resource($result),
            $this->messagesModel::DELETED,
            200
        );
    }
}
