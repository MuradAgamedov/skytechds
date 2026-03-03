<?php

namespace App\Models\SiteInfo;

use Illuminate\Database\Eloquent\Model;

class SiteInfoTranslation extends Model
{
    protected $fillable = ["header_logo_light_for_mode_alt_text", "header_logo_dark_for_mode_alt_text", "footer_logo_light_mode_alt_text", "footer_logo_dark_mode_alt_text", "language_id", "site_info_id"];
    public function translation() {
        return $this->belongsTo(SiteInfo::class);
    }
}
