<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = ["status", "order", "photo"];
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    public function translations()
    {
        return $this->hasMany(TestimonialTranslation::class);
    }
}
