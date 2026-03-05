<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $fillable = ["title", "language_id", "tag_id"];

    public function tag() {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function blogs() {
        return $this->belongsToMany(Blog::class);
    }
}
