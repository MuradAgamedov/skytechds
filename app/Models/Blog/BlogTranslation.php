<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $fillable = ["title", "seo_title", "seo_description", "seo_keywords", "card_image_alt_text", "description", "language_id", "blog_id"];


    public function translation()
    {
        return $this->hasOne(Blog::class, "id", "blog_id");
    }
}
