<?php

namespace App\Interfaces\Repositories;

use App\Models\Testimonial\Testimonial;
use Illuminate\Pagination\LengthAwarePaginator;

interface TestimonialRepositoryInterface
{
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator;
    public function store(array $data): Testimonial;
    public function update(Testimonial $testimonial, array $data): Testimonial;
    public function destroy(Testimonial $testimonial): Testimonial;
    public function find(Testimonial $testimonial);
}
