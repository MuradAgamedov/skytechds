<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    protected $fillable = ["image"];


    protected function image() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }

    public function translations() {
        return $this->hasMany(AboutTranslation::class);
    }
}
