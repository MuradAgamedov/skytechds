<?php

namespace App\Repositories;

use App\Models\Language;
use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\Repositories\LanguageRepositoryInterface;


class LanguageRepository implements LanguageRepositoryInterface {
    public function __construct(public Language $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):Language {
        return $this->model::create($data);
    }
    public function update(Language $language, array $data):Language {
        $language->update($data);
        $language->refresh();
        return $language;
    }
    public function destroy(Language $language):Language {
        $language->delete();
        return $language;
    }
    public function find(Language $language) {
        return $language;
    }
}