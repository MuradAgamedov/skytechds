<?php

namespace App\Observers;

use App\Models\Address\Address;

class AddressObserver
{
    public function creating(Address $address): void
    {
        $address->order = (Address::lockForUpdate()->max("order") ?? 0) + 1;
    }

    public function created(Address $address): void
    {
        //
    }

    public function updated(Address $address): void
    {
        //
    }

    public function deleted(Address $address): void
    {
        //
    }

    public function restored(Address $address): void
    {
        //
    }

    public function forceDeleted(Address $address): void
    {
        //
    }
}
