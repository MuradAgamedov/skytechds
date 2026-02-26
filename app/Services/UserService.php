<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserService implements UserServiceInterface{

    
    public function login (array $data): JsonResponse {
        if(!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                "email" => ["Email və ya şifrə yanlışdır."]
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken("user-token")->plainTextToken;

        return response()->json([
            "user" => new UserResource($user),
            "token" => $token
        ]);
    }
}