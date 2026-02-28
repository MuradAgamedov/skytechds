<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTranslationResource extends JsonResource
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
            "title" => $this->title,
            "card_title" => $this->card_title,
            "description" => $this->description,
            "icon_alt_text" => $this->icon_alt_text,
            "inner_image_alt_text" => $this->inner_image_alt_text,
            "seo_title" => $this->seo_title,
            "seo_description" => $this->seo_description,
            "seo_keywords" => $this->seo_keywords,
            "language_id" => $this->language_id,
        ];
    }
}
