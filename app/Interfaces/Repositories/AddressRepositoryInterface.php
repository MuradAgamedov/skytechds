<?php

namespace App\Interfaces\Repositories;

use App\Models\Address\Address;
use Illuminate\Pagination\LengthAwarePaginator;

interface AddressRepositoryInterface {
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator;
    public function store(array $data):Address;
    public function update(Address $address, array $data):Address;
    public function destroy(Address $address):Address;
    public function find(Address $address);
}