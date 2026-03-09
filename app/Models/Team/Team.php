<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    protected $fillable = ["status", "order", "image"];
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    public function translations()
    {
        return $this->hasMany(TeamTranslation::class);
    }
}
