<?php

namespace App\Interfaces\Repositories;

use App\Models\ContactMessage;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactMessageRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data);
    public function destroy($message);
    public function find($message);
    public function toggleRead(ContactMessage $model) : ContactMessage;
}