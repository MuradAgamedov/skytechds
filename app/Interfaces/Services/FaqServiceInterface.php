<?php

namespace App\Interfaces\Services;

use App\Models\Faq\Faq;
use Illuminate\Pagination\LengthAwarePaginator;

interface FaqServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Faq;
    public function update(Faq $faq, array $data):Faq;
    public function destroy(Faq $faq):Faq;
    public function find(Faq $faq);
}