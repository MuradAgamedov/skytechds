<?php
namespace App\Interfaces\Services;

use App\Models\Phone;

interface PhoneServiceInterface {
    public function store(array $data);
    public function update(Phone $phone, array $data);
}
