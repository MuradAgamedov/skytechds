<?php

namespace App\Http\Resources\Statistics;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
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
            "translations" => StatisticTranslationResource::collection(
                $this->whenLoaded("translations")
            ),
            "icon" => $this->icon,
            "status" => $this->id

        ];
    }
}
