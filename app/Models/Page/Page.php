<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ["slug", "status", "order"];
    
    public function translations() {
        return $this->hasMany(PageTranslation::class);
    }
}
