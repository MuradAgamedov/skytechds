<?php

namespace App\Observers;
use App\Models\Services\Service ;
class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->order = (Service::lockForUpdate()->max("order") ?? 0) + 1;
    }
}
