<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    protected $fillable = ["full_name", "position", "company", "text", "language_id", "testimonial_id"];

    public function translation()
    {
        return $this->belongsTo(Testimonial::class);
    }
}
