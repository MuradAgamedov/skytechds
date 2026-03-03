<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Service\ServiceTranslationResource;

class ServiceResource extends JsonResource
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
            "translations" => ServiceTranslationResource::collection(
                $this->whenLoaded("translations")
            ),
            "slug" => $this->slug,
            "icon" => $this->icon ? asset("storage/" . $this->icon) : null,
            "inner_image" => $this->inner_image ? asset("storage/" . $this->inner_image) : null,
            "status" => $this->status,
        ];
    }
}
