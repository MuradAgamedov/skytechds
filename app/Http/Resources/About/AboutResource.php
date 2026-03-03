<?php

namespace App\Http\Resources\About;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
            "translations" => AboutTranslationResource::collection(
                $this->whenLoaded("translations")
            ),
            "image" => $this->image ? asset("storage/" . $this->image) : null,

        ];
    }
}
