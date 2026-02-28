<?php

namespace App\Models\BlogCategory;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = ["slug", "status", "order"];
    public function translations()
    {
        return $this->hasMany(BlogCategoryTranslation::class);
    }
}
