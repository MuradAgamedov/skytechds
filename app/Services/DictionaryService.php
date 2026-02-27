<?php

namespace App\Services;

use App\Interfaces\Repositories\DictionaryRepositoryInterface;
use App\Models\Dictionary\Dictionary;
use App\Repositories\DictionaryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DictionaryService implements DictionaryRepositoryInterface {
    public function __construct(public DictionaryRepository $repository)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data): Dictionary {
        return $this->repository->store($data);
    }

    public function update(Dictionary $dictionary, array $data): Dictionary {
        return $this->repository->update($dictionary, $data);
    }

    public function destroy(Dictionary $dictionary) : Dictionary {
        return $this->repository->destroy($dictionary);
    }

    public function find(Dictionary $dictionary) : Dictionary {
        return $this->repository->find($dictionary);
    }
}