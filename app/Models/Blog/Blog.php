<?php

namespace App\Models\Blog;

use App\Models\Tag\Tag;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $fillable = ["slug", "card_image", "published_at"];

    protected function cardImage() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
