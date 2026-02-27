<?php
namespace App\Repositories;
use App\Interfaces\Repositories\PhoneRepositoryInterface;
use App\Models\Phone;
use Illuminate\Pagination\LengthAwarePaginator;

class PhoneRepository implements PhoneRepositoryInterface{
    public function __construct(public Phone $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):Phone {
        return $this->model::create($data);
    }

    public function update(Phone $phone, array $data):Phone {
        $phone->update($data);
        $phone->refresh();
        return $phone;
    }

    public function destroy(Phone $phone): Phone
    {
        $phone->delete();
        return $phone;
    }
    public function find(Phone $phone):Phone {
        return $phone;
    }
}