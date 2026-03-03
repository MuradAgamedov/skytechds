<?php

namespace App\Http\Controllers;

use App\Http\Requests\Testimonial\CreateRequest;
use App\Http\Requests\Testimonial\UpdateRequest;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Models\Testimonial\Testimonial;
use App\Services\TestimonialService as ServicesTestimonialService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class TestimonialController extends Controller
{
        public function __construct(public ServicesTestimonialService $testimonial_service) {}

    public function index(): JsonResponse
    {
        $blog_categories = $this->testimonial_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            TestimonialResource::collection($blog_categories),
            "Testimonials fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $testimonial = $this->testimonial_service->store($request->validated());

        return ApiResponse::success(
            new TestimonialResource($testimonial),
            "Testimonial added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Testimonial $testimonial): JsonResponse
    {
        $testimonial = $this->testimonial_service->update($testimonial, $request->validated());
        return ApiResponse::success(
            new TestimonialResource($testimonial),
            "Testimonial updated successfully",
            200
        );
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $testimonial = $this->testimonial_service->destroy($testimonial);

        return ApiResponse::success(
            new TestimonialResource($testimonial),
            "Testimonial deleted successfully",
            200
        );
    }


    public function show(Testimonial $testimonial): JsonResponse
    {
        $blog = $this->testimonial_service->find($testimonial);

        return ApiResponse::success(
            new TestimonialResource($blog),
            "Testimonial fetched successfully",
            200
        );
    }
}
