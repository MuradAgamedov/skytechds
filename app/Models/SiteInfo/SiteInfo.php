<?php

namespace App\Models\SiteInfo;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class SiteInfo extends Model
{
    protected $fillable = [
        "header_logo_light_for_mode",
        "header_logo_dark_for_mode",
        "footer_logo_light_for_mode",
        "footer_logo_dark_for_mode"
    ];

    protected function headerLogoLightForMode(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    protected function headerLogoDarkForMode(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    protected function footerLogoLightForMode(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    protected function footerLogoDarkForMode(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    public function translations(): HasMany
    {
        return $this->hasMany(SiteInfoTranslation::class);
    }
}