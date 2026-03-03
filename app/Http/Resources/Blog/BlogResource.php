<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "translations" => BlogResourceTranslation::collection(
                $this->whenLoaded("translations")
            ),
            "slug" => $this->slug,
            "card_image" => $this->card_image ? asset("storage/" . $this->card_image) : null,
            "status" => $this->status,
        ];
    }
}
