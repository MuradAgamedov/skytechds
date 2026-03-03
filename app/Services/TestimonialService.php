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
    public function store(array $data): Testimonial
    {

        return $this->repository->store($data);
    }

    public function update(Testimonial $tetsimonial, array $data): Testimonial
    {
        return $this->repository->update($tetsimonial, $data);
    }

    public function destroy(Testimonial $tetsimonial): Testimonial
    {
        return $this->repository->destroy($tetsimonial);
    }

    public function find(Testimonial $tetsimonial): Testimonial
    {
        return $this->repository->find($tetsimonial);
    }
}
