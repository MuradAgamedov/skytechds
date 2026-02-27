<?php

namespace App\Http\Resources\Dictionary;

use App\Http\Resources\Dictionary\DictionaryTranslationResource as DictionaryTranslationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DictionaryResource extends JsonResource
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
            "keyword" => $this->keyword,
            "translations" => DictionaryTranslationResource::collection($this->translations),
            "status" => $this->status,
        ];
    }
}
