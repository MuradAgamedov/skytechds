<?php


namespace App\Interfaces\Services;

use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;

interface MapServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Map;
    public function update(Map $email, array $data):Map;
    public function destroy(Map $email):Map;
    public function find(Map $email);
}