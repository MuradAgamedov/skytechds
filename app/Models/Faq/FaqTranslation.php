<?php

namespace App\Models\Faq;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $fillable = ["question", "answer", "language_id", "faq_id"];
    public function translation() {
        return $this->hasMany(Faq::class);
    }
}
