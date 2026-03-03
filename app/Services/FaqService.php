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
    public function store(array $data): Faq {
        
        return $this->repository->store($data);
    }

    public function update(Faq $faq, array $data): Faq {
        return $this->repository->update($faq, $data);
    }

    public function destroy(Faq $faq) : Faq {
        return $this->repository->destroy($faq);
    }

    public function find(Faq $faq) : Faq {
        return $this->repository->find($faq);
    }
}