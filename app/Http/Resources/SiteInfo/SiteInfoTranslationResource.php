<?php

namespace App\Http\Resources\SiteInfo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteInfoTranslationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "header_logo_light_for_mode_alt_text" => $this->header_logo_light_for_mode_alt_text,
            "header_logo_dark_for_mode_alt_text" => $this->header_logo_dark_for_mode_alt_text,
            "footer_logo_light_mode_alt_text" => $this->footer_logo_light_mode_alt_text,
            "footer_logo_dark_mode_alt_text" => $this->footer_logo_dark_mode_alt_text,
            "language_id" => $this->language_id,
            "site_info_id" => $this->site_info_id,
        ];
    }
}
