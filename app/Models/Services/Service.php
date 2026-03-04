<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
class Service extends Model
{
    protected $fillable = [
        "icon",
        "inner_image",
        "slug",
        "status",
        "order"
    ];
    protected function icon() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    protected function innerImage() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class, "service_id");
    }
}
