<?php


namespace App\Interfaces\Services;

use App\Models\Language;
use Illuminate\Pagination\LengthAwarePaginator;

interface LanguageServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Language;
    public function update(Language $language, array $data):Language;
    public function destroy(Language $language):Language;
    public function find(Language $language);
}