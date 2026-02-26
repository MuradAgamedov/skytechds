<?php
namespace App\Services;

use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserService implements UserServiceInterface{

    
    public function login (array $data):array {
        if(!Auth::attempt([
            "email" => $data["email"],
            "password" => $data["password"]
        ])) {
            throw ValidationException::withMessages([
                "email" => ["Email və ya şifrə yanlışdır."]
            ]);
        }

        $user = auth()->user();
        $token = $user->createToken("user-token")->plainTextToken;

        return [
            "user" => $user,
            "token" => $token
        ];
    }
}