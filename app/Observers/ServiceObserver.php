<?php

namespace App\Observers;
use App\Models\Services\Service ;
class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->order = (Service::lockForUpdate()->max("order") ?? 0) + 1;
        $service->slug = $service->slug ?? str()->slug($service->translations()->where("language_id", 1)->first()->title) . "-" . uniqid();
    }

    public function updating(Service $service)
    {
        if (!$service->slug) {
            $service->slug = str()->slug($service->translations()->where("language_id", 1)->first()->title) . "-" . uniqid();
        }
    }
}
