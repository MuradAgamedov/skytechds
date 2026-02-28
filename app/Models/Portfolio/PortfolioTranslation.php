<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioTranslation extends Model
{
    protected $fillable = [
        "title",
        "portfolio_id",
        "language_id"
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, "portfolio_id");
    }
}
