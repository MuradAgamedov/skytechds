<?php

namespace App\Services;

use App\Interfaces\Services\PhoneServiceInterface;
use App\Models\Phone;
use App\Repositories\PhoneRepository;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class PhoneService implements PhoneServiceInterface {
    public function __construct(public PhoneRepository $repository)
    {
    }

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Phone {
        return $this->repository->store($data);
    }

    public function update(Phone $phone, array $data): Phone {
        return $this->repository->update($phone, $data);
    }

    public function destroy(Phone $phone) : Phone {
        return $this->repository->destroy($phone);
    }

    public function find(Phone $phone) : Phone {
        return $this->repository->find($phone);
    }

}