<?php

namespace App\Interfaces\Services;

use App\Models\Address\Address;
use Illuminate\Pagination\LengthAwarePaginator;

interface AddressServiceInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Address;
    public function update(Address $address, array $data):Address;
    public function destroy(Address $address):Address;
    public function find(Address $address);
}