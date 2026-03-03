<?php

namespace App\Interfaces\Repositories;

use App\Models\Language;
use Illuminate\Pagination\LengthAwarePaginator;

interface LanguageRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Language;
    public function update(Language $language, array $data): Language;
    public function destroy(Language $language): Language;
    public function find(Language $language);
}
