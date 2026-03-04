<?php

namespace App\Services;

use App\Interfaces\Services\PhoneServiceInterface;
use App\Repositories\PhoneRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PhoneService implements PhoneServiceInterface {
    public function __construct(public PhoneRepository $repository)
    {
    }

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data) {
        return $this->repository->store($data);
    }

    public function update($phone, array $data) {
        return $this->repository->update($phone, $data);
    }

    public function destroy($phone)  {
        return $this->repository->destroy($phone);
    }

    public function find($phone)  {
        return $this->repository->find($phone);
    }

}