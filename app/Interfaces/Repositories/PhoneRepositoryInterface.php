<?php
namespace App\Interfaces\Repositories;

use App\Models\Phone;
use Illuminate\Pagination\LengthAwarePaginator;

interface PhoneRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Phone;
    public function update(Phone $phone, array $data):Phone;
    public function destroy(Phone $phone):Phone;
    public function find(Phone $phone):Phone;
}