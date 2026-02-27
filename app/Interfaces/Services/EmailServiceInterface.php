<?php


namespace App\Interfaces\Services;

use App\Models\Email;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmailServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Email;
    public function update(Email $email, array $data):Email;
    public function destroy(Email $email):Email;
    public function find(Email $email);
}