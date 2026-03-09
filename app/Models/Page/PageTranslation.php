<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $fillable = ["page_id", "language_id", "title", "seo_title", "seo_description", "seo_keywords"];
    
    public function page() {
        return $this->belongsTo(Page::class);
    }
    
}
