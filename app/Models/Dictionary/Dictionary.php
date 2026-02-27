<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = ["keyword"];
    public function translations() {
        return $this->hasMany(DictionaryTranslation::class);
    }
}
