<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["order", "status"];

    public function translations() {
        return $this->hasMany(Tag::class);
    }
}
