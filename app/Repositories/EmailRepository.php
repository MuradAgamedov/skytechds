<?php

namespace App\Repositories;

use App\Interfaces\Repositories\EmailRepositoryInterface;
use App\Models\Email;
use Illuminate\Pagination\LengthAwarePaginator;

class EmailRepository implements EmailRepositoryInterface{
    public function __construct(public Email $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):Email {
        return $this->model::create($data);
    }
    public function update(Email $email, array $data):Email {
        $email->update($data);
        $email->refresh();
        return $email;
    }
    public function destroy(Email $email):Email {
        $email->delete();
        return $email;
    }
    public function find(Email $email) {
        return $email;
    }
}