<?php
namespace App\Repositories;
use App\Interfaces\Repositories\PhoneRepositoryInterface;
use App\Models\Phone;
use App\Repositories\Base\BaseCrudRepository;

class PhoneRepository extends BaseCrudRepository implements PhoneRepositoryInterface{
    public function __construct(Phone $model)
    {
        $this->model = $model;
    }
}