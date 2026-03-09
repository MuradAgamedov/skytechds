<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllSeoPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'is_indexed' => $this->is_indexed,
            'is_followed' => $this->is_followed,
            'meta_header' => $this->meta_header,
            'meta_footer' => $this->meta_footer,
        ];
    }
}
