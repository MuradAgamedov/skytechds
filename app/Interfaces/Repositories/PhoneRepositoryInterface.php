<?php
namespace App\Interfaces\Repositories;

use App\Models\Phone;

interface PhoneRepositoryInterface {
    public function store(array $data);
    public function update(Phone $phone, array $data);
    
}