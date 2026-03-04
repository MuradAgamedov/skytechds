<?php

namespace App\Services;

use App\Interfaces\Services\FaqServiceInterface;
use App\Models\Faq\Faq;
use App\Repositories\FaqRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class FaqService implements FaqServiceInterface {
    public function __construct(public FaqRepository $repository)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data) {
        
        return $this->repository->store($data);
    }

    public function update($faq, array $data) {
        return $this->repository->update($faq, $data);
    }

    public function destroy($faq)  {
        return $this->repository->destroy($faq);
    }

    public function find($faq)  {
        return $this->repository->find($faq);
    }
}