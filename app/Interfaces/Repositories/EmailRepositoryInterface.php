<?php

namespace App\Interfaces\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface EmailRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data);
    public function update($email, array $data);
    public function destroy($email);
    public function find($email);
}