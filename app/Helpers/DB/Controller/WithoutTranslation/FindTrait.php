<?php

namespace App\Helpers\DB\Controller\WithoutTranslation;

use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

trait FindTrait {
    public function show($id) {
         $email = $this->service->find($id);
    
        return ApiResponse::success(
            new $this->resource($email),
            "Email fetched successfully",
            200
        );
    }
}