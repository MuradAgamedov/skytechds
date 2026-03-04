<?php
namespace App\Support;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse {

    
    public static function success($data=null, $message=null,$statusCode=200) : JsonResponse {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data,
        ], $statusCode);
    }


    public static function error($message=null,$statusCode=400) : JsonResponse {
        return response()->json([
            "success" => false,
            "message" => $message
        ], $statusCode);
    }
}

