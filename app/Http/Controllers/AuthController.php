<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\TwoFactorRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function __construct(public UserService $user_service)
    {
    }
    public function login(LoginRequest $request): JsonResponse {
        $result = $this->user_service->login($request->validated());
        return ApiResponse::success(
           new LoginResource($result)
        , "Success login", 200);
    }
    
    public function verifyTwoFactor(TwoFactorRequest $request): JsonResponse {
        $result = $this->user_service->verifyTwoFactor($request->validated());
        return ApiResponse::success(
           new LoginResource($result)
        , "Login successful", 200);
    }
    
    public function logout(): JsonResponse {
        $result = $this->user_service->logout();
        return ApiResponse::success($result, "Logged out successfully", 200);
    }
}
