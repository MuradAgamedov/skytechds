<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageTranslationResource extends JsonResource
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
            "seo_title" => $this->seo_title,
            "seo_description" => $this->seo_description,
            "seo_keywords" => $this->seo_keywords,
        ];
    }
}
