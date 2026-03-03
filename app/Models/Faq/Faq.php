<?php

namespace App\Models\Faq;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ["status", "order"];

    public function translations() {
        return $this->hasMany(FaqTranslation::class);
    }
}
