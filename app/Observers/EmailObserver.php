<?php

namespace App\Observers;

use App\Models\Email;

class EmailObserver
{

    public function creating(Email $email) {
        $email->order = Email::lockForUpdate()->max("order") + 1;
    }
    
}
