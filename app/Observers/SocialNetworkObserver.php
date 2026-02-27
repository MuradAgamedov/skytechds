<?php

namespace App\Observers;

use App\Models\SocialNetwork;

class SocialNetworkObserver
{
    public function creating(SocialNetwork $socialNetwork): void
    {
        $socialNetwork->order = (SocialNetwork::lockForUpdate()->max("order") ?? 0) + 1;
    }

    public function created(SocialNetwork $socialNetwork): void
    {
        //
    }

    public function updated(SocialNetwork $socialNetwork): void
    {
        //
    }

    public function deleted(SocialNetwork $socialNetwork): void
    {
        //
    }

    public function restored(SocialNetwork $socialNetwork): void
    {
        //
    }

    public function forceDeleted(SocialNetwork $socialNetwork): void
    {
        //
    }
}
