<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;

class DictionaryTranslation extends Model
{
    protected $fillable = ["value", "language_id", "dictionary_id"];

    public function translation() {
        return $this->hasOne(Dictionary::class);
    }
}
