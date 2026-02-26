<?php

namespace App\Services;

use App\Interfaces\Services\PhoneServiceInterface;
use App\Models\Phone;
use App\Repositories\PhoneRepository;
use Exception;

class PhoneService implements PhoneServiceInterface {
    public function __construct(public PhoneRepository $repository)
    {
    }


    public function store(array $data) {
        return $this->repository->store($data);
    }

    public function update(Phone $phone, array $data) {
        try{
            $this->repository->update($phone, $data);
            $phone->refresh();
            return $phone;
        } catch (Exception $e){
            return $e;
        }
    }

}