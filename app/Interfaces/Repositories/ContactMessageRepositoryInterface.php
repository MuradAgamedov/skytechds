<?php

namespace App\Interfaces\Repositories;

use App\Models\ContactMessage;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactMessageRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):ContactMessage;
    public function destroy(ContactMessage $message):ContactMessage;
    public function find(ContactMessage $message):ContactMessage;
    public function toggleRead(ContactMessage $id):ContactMessage;
}