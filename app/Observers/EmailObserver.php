<?php

namespace App\Observers;

use App\Models\Phone;

class EmailObserver
{

    public function creating(Phone $phone) {
        $phone->order = Phone::lockForUpdate()->max("order") + 1;
    }
    /**
     * Handle the Phone "created" event.
     */
    public function created(Phone $phone): void
    {
        //
    }

    /**
     * Handle the Phone "updated" event.
     */
    public function updated(Phone $phone): void
    {
        //
    }

    /**
     * Handle the Phone "deleted" event.
     */
    public function deleted(Phone $phone): void
    {
        //
    }

    /**
     * Handle the Phone "restored" event.
     */
    public function restored(Phone $phone): void
    {
        //
    }

    /**
     * Handle the Phone "force deleted" event.
     */
    public function forceDeleted(Phone $phone): void
    {
        //
    }
}
