<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "icon",
        "inner_image",
        "slug",
        "status",
        "order"
    ];

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class, "service_id");
    }
}
