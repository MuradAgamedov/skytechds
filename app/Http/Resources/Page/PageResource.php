<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            "translations" => PageTranslationResource::collection(
                $this->whenLoaded("translations")
            ),
            "status" => $this->status,
            "order" => $this->order,
            "slug" => $this->slug,
        ];
    }
}
