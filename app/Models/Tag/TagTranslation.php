<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $fillable = ["title", "language_id", "tag_id"];

    public function translation() {
        return $this->belongsTo(TagTranslation::class);
    }
}
