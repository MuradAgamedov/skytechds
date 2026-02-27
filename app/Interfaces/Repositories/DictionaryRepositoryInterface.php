<?php

namespace App\Interfaces\Repositories;

use App\Models\Dictionary\Dictionary;
use Illuminate\Pagination\LengthAwarePaginator;

interface DictionaryRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Dictionary;
    public function update(Dictionary $dictionary, array $data):Dictionary;
    public function destroy(Dictionary $dictionary):Dictionary;
    public function find(Dictionary $dictionary);
}