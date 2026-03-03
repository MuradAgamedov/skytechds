<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    protected $fillable = ["image_alt_text", "text"];
    public function translation() {
        return $this->belongsTo(About::class);
    }
}
