<?php

namespace App\Http\Resources\Dictionary;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DictionaryTranslationResource extends JsonResource
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
            "value" => $this->value,
            "language_id" => $this->language_id,
        ];
    }
}
