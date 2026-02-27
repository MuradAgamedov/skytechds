<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ["status", "order"];

    public function translations() {
        return $this->hasMany(AddressTranslation::class);
    }
}
