<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
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
            "translations" => PortfolioTranslationResource::collection(
                $this->whenLoaded("translations")
            ),
            "status" => $this->status,
            "card_image" => $this->card_image ? asset("storage/" . $this->card_image) : null,
            "url" => $this->url,
        ];
    }
}
