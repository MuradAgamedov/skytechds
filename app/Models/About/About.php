<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ["image"];
    public function translations() {
        return $this->hasMany(AboutTranslation::class);
    }
}
