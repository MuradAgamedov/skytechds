<?php

namespace App\Services;

use App\Interfaces\Services\AddressServiceInterface;
use App\Models\Address\Address;
use App\Repositories\AddressRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class AddressService implements AddressServiceInterface {
    public function __construct(public AddressRepository $repository)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Address {
        
        return $this->repository->store($data);
    }

    public function update(Address $phone, array $data): Address {
        return $this->repository->update($phone, $data);
    }

    public function destroy(Address $phone) : Address {
        return $this->repository->destroy($phone);
    }

    public function find(Address $email) : Address {
        return $this->repository->find($email);
    }
}