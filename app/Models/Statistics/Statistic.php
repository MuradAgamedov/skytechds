<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = ["icon", "status", "order"];


    public function translations() {
        return $this->hasMany(StatisticTranslation::class);
    }
}
