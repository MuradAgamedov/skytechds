<?php
namespace App\Services;

use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\TwoFactorCodeMail;

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
        $this->sendTwoFactorCode($user);
        
        // Store user ID in cache (10 minutes expiry)
        $userId = $user->id;
        Cache::put('2fa:user:id', $userId, now()->addMinutes(10));

        Auth::logout();

        return [
            "message" => "Two factor code sent to your email",
            "requires_2fa" => true,
            "user_id" => $userId
        ];
    }

    public function verifyTwoFactor(array $data): array
    {
        $userId = Cache::get('2fa:user:id');
        if (!$userId) {
            throw ValidationException::withMessages([
                "code" => ["Session expired. Please login again."]
            ]);
        }

        $user = \App\Models\User::find($userId);
        if (!$user || $user->two_factor_code !== $data['code'] || $user->two_factor_expires_at < now()) {
            throw ValidationException::withMessages([
                "code" => ["Invalid or expired verification code."]
            ]);
        }

        // Clear 2FA fields
        $user->update([
            'two_factor_code' => null,
            'two_factor_expires_at' => null
        ]);

        // Clear session
        session()->forget('2fa:user:id');

        // Login user and generate token
        Auth::login($user);
        $token = $user->createToken("user-token")->plainTextToken;

        return [
            "user" => $user,
            "token" => $token
        ];
    }

    public function logout(): array
    {
        $user = auth()->user();
        
        if ($user) {
            // Revoke all tokens for that user
            $user->tokens()->delete();
            
            // Clear 2FA cache if exists
            Cache::forget('2fa:user:id');
        }
        
        Auth::logout();
        
        return [
            "message" => "Logged out successfully"
        ];
    }

    public function sendTwoFactorCode($user)
    {
        $code = rand(100000, 999999);

        $user->update([
            'two_factor_code' => $code,
            'two_factor_expires_at' => now()->addMinutes(10)
        ]);

        Mail::to($user->email)->send(new TwoFactorCodeMail($code));
    }
}