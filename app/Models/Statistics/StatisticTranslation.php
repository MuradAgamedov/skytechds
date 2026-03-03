<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class StatisticTranslation extends Model
{
    protected $fillable = ["icon_alt_text", "title", "subtitle", "language_id", "statistic_id"];

    
    public function translation() {
        return $this->belongsTo(Statistic::class);
    }
}
