<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function __construct(public UserService $user_service)
    {
    }
    public function login(LoginRequest $request): JsonResponse {
        return $this->user_service->login($request->validated());
    }
}
