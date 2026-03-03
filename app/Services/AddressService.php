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

    public function update(Address $address, array $data): Address {
        return $this->repository->update($address, $data);
    }

    public function destroy(Address $address) : Address {
        return $this->repository->destroy($address);
    }

    public function find(Address $address) : Address {
        return $this->repository->find($address);
    }
}