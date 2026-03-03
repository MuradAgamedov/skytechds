<?php
namespace App\Interfaces\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface PhoneRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data);
    public function update($phone, array $data);
    public function destroy($phone);
    public function find($phone);
}