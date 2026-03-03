<?php

namespace App\Http\Resources\Testimonial;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialTranslationResource extends JsonResource
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
            "full_name" => $this->full_name,
            "company" => $this->company,
            "position" => $this->position,
        ];
    }
}
