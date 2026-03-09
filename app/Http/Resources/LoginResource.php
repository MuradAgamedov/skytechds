<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->resource;
        
        // Handle 2FA required response
        if (isset($data['requires_2fa']) && $data['requires_2fa']) {
            return [
                'message' => $data['message'],
                'requires_2fa' => $data['requires_2fa'],
                'user_id' => $data['user_id']
            ];
        }
        
        // Handle successful login with user and token
        return [
            'user' => new UserResource($data['user']),
            "token" => $data["token"]
        ];
    }
}
