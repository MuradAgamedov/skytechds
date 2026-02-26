<?php
namespace App\Repositories;
use App\Interfaces\Repositories\PhoneRepositoryInterface;
use App\Models\Phone;

class PhoneRepository implements PhoneRepositoryInterface{
    public function __construct(public Phone $model)
    {
    }
    public function store(array $data) {
        return $this->model::create($data);
    }

    public function update(Phone $phone, array $data) {
        return $phone->update($data);
    }
}