<?php

namespace App\Observers;

use App\Models\Faq\Faq;

class FaqObserve
{
    public function creating(Faq $faq){
        $faq->order = Faq::lockForUpdate()->max("order") + 1;
    }
}
