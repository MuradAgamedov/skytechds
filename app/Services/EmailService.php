<?php

namespace App\Services;

use App\Interfaces\Services\EmailServiceInterface;
use App\Models\Email;
use App\Repositories\EmailRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailService implements EmailServiceInterface{
    public function __construct(public EmailRepository $repository)
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

    public function find($email)  {
        return $this->repository->find($email);
    }
}