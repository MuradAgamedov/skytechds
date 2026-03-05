<?php

namespace App\Observers;

use App\Models\BlogCategory\BlogCategory;

class BlogCategoryObserver
{
    public function creating(BlogCategory $blogCategory)
    {
        $blogCategory->order = BlogCategory::lockForUpdate()->max("order") + 1;
        $blogCategory->slug = $blogCategory->slug ?? str()->slug($blogCategory->translations()->where("language_id", 1)->first()->title) . "-" . uniqid();
    }

    public function updating(BlogCategory $blogCategory)
    {
        if (!$blogCategory->slug) {
            $blogCategory->slug = str()->slug($blogCategory->translations()->where("language_id", 1)->first()->title) . "-" . uniqid();
        }
    }
}
