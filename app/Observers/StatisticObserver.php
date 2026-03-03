<?php

namespace App\Observers;

use App\Models\Statistics\Statistic;
use App\Models\Statistics\Statistics;

class StatisticObserver
{
    public function creating(Statistic $statistics) {
        $statistics->order = Statistic::lockForUpdate()->max("order") + 1;
    }
}
