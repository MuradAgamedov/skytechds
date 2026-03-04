<?php

namespace App\Services;

use App\Interfaces\Services\TestimonialServiceInterface;
use App\Models\Testimonial\Testimonial;
use App\Repositories\TestimonialRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TestimonialService implements TestimonialServiceInterface
{
    public function __construct(public TestimonialRepository $repository) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->repository->getWidthPagination($with, $limit);
    }
    public function store(array $data)
    {

        return $this->repository->store($data);
    }

    public function update($tetsimonial, array $data)
    {
        return $this->repository->update($tetsimonial, $data);
    }

    public function destroy($tetsimonial)
    {
        return $this->repository->destroy($tetsimonial);
    }

    public function find($tetsimonial)
    {
        return $this->repository->find($tetsimonial);
    }
}
