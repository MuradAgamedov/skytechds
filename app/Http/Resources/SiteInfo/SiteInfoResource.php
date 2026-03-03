<?php

namespace App\Http\Resources\SiteInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteInfoResource extends JsonResource
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
            "translations" => SiteInfoTranslationResource::collection($this->translations),
            "header_logo_light_for_mode" => $this->header_logo_light_for_mode,
            "header_logo_dark_for_mode" => $this->header_logo_dark_for_mode,
            "footer_logo_light_for_mode" => $this->footer_logo_light_for_mode,
            "footer_logo_dark_for_mode" => $this->footer_logo_dark_for_mode,
            "favicon" => $this->favicon,
        ];
    }
}
