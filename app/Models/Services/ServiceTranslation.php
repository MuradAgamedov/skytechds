<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        "title",
        "card_title",
        "icon_alt_text",
        "inner_image_alt_text",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "description",
        "service_id",
        "language_id"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, "service_id");
    }
}
