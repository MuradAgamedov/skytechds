<?php

namespace App\Services;

use App\Interfaces\Services\DictionaryServiceInterface;
use App\Repositories\DictionaryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DictionaryService implements DictionaryServiceInterface {
    public function __construct(public DictionaryRepository $repository)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data){
        return $this->repository->store($data);
    }

    public function update($dictionary, array $data){
        return $this->repository->update($dictionary, $data);
    }

    public function destroy($dictionary) {
        return $this->repository->destroy($dictionary);
    }

    public function find($dictionary) {
        return $this->repository->find($dictionary);
    }
}