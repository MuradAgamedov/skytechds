<?php

namespace App\Observers;

use App\Models\BlogCategory\BlogCategory;

class BlogCategoryObserver
{
    public function creating(BlogCategory $blogCategory)
    {
        $blogCategory->order = BlogCategory::lockForUpdate()->max("order") + 1;
    }
}
