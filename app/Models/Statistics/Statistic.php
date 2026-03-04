<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Statistic extends Model
{
    protected $fillable = ["icon", "status", "order"];

    protected function icon() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    public function translations() {
        return $this->hasMany(StatisticTranslation::class);
    }
}
