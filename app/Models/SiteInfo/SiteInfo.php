<?php

namespace App\Models\SiteInfo;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = ["header_logo_light_for_mode", "header_logo_dark_for_mode", "footer_logo_light_for_mode", "footer_logo_dark_for_mode"];

    public function translations() {
        return $this->hasMany(SiteInfoTranslation::class);
    }
}
