<?php

namespace App\Models\Portfolio;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        "status",
        "order",
        "card_image",
        "url"
    ];
    protected function cardImage() : Attribute {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null
        );
    }
    public function translations()
    {
        return $this->hasMany(PortfolioTranslation::class, "portfolio_id");
    }
}
