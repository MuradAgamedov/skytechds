<?php

namespace App\Models\Tag;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["order", "status"];

    public function translations() {
        return $this->hasMany(TagTranslation::class);
    }

    public function blogs() {
        return $this->belongsToMany(Blog::class, 'blog_tag');
    }
}
