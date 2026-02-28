<?php

namespace App\Observers;

use App\Models\Blog\Blog;

class BlogObserver
{
    public function creating(Blog $blog)
    {
        $blog->order = Blog::lockForUpdate()->max("order") + 1;
    }
}
