<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        "status",
        "order",
        "card_image",
        "url"
    ];

    public function translations()
    {
        return $this->hasMany(PortfolioTranslation::class, "portfolio_id");
    }
}
