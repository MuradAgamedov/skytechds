<?php

namespace App\Observers;

use App\Models\Language;

class LanguageObserver
{
    public function creating(Language $language): void
    {
        $language->order = (Language::lockForUpdate()->max("order") ?? 0) + 1;
    }

    public function created(Language $language): void
    {
        //
    }

    public function updated(Language $language): void
    {
        //
    }

    public function deleted(Language $language): void
    {
        //
    }

    public function restored(Language $language): void
    {
        //
    }

    public function forceDeleted(Language $language): void
    {
        //
    }
}
