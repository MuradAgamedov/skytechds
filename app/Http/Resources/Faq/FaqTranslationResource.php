<?php

namespace App\Http\Resources\Faq;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqTranslationResource extends JsonResource
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
            "question" => $this->question,
            "answer" => $this->answer,
            "faq_id" => $this->faq_id,
            "language_id" => $this->language_id,
        ];
    }
}
