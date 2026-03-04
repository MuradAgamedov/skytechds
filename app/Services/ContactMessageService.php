<?php

namespace App\Services;

use App\Interfaces\Services\ContactMessageServiceInterface;
use App\Interfaces\Services\PhoneServiceInterface;
use App\Models\ContactMessage;
use App\Models\Phone;
use App\Repositories\ContactMessageRepository;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactMessageService implements ContactMessageServiceInterface {
    public function __construct(public ContactMessageRepository $repository)
    {
    }

    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data) {
        return $this->repository->store($data);
    }

    public function destroy($phone)  {
        return $this->repository->destroy($phone);
    }

    public function find($phone)  {
        return $this->repository->find($phone);
    }


    public function toggleRead(ContactMessage $contactMessage):ContactMessage {
         return $this->repository->toggleRead($contactMessage);
    }

}