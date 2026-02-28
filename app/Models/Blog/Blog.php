<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ["slug", "card_image", "published_at"];

    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }
}
