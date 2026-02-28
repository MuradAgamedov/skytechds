<?php

namespace App\Models\BlogCategory;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslation extends Model
{
    protected $fillable = ["title", "seo_title", "seo_description", "seo_keywords", "blog_category_id", "language_id"];
    public function translation()
    {
        return $this->hasOne(BlogCategory::class, "id", "blog_category_id");
    }
}
