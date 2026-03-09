<?php

namespace App\Observers;

use App\Models\Page;

class PageOvserver
{
    public function creating(Page $page)
    {
        $page->order = Page::lockForUpdate()->max("order") + 1;
    }
}
