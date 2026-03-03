<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ["status", "order", "photo"];

    public function translations()
    {
        return $this->hasMany(TestimonialTranslation::class);
    }
}
