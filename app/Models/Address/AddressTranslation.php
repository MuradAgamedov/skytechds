<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;


class AddressTranslation extends Model
{
    protected $fillable = ["address", "language_id", 'address_id'];

    public function translation() {
        return $this->belongsTo(Address::class);
    }
}
