<?php

namespace App\Observers;

use App\Models\Map;

class MapObserver
{
    public function creating(Map $map): void
    {
        $map->order = (Map::lockForUpdate()->max("order") ?? 0) + 1;
    }

    public function created(Map $map): void
    {
        //
    }

    public function updated(Map $map): void
    {
        //
    }

    public function deleted(Map $map): void
    {
        //
    }

    public function restored(Map $map): void
    {
        //
    }

    public function forceDeleted(Map $map): void
    {
        //
    }
}
