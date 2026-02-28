<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\CreateRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog\Blog;
use App\Services\BlogService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogController extends Controller
{
    public function __construct(public BlogService $blogCategory_service) {}

    public function index(): JsonResponse
    {
        $blog_categories = $this->blogCategory_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            BlogResource::collection($blog_categories),
            "Blogs fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $blogCategory = $this->blogCategory_service->store($request->validated());

        return ApiResponse::success(
            new BlogResource($blogCategory),
            "Blog added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Blog $blog): JsonResponse
    {
        $blog = $this->blogCategory_service->update($blog, $request->validated());

        return ApiResponse::success(
            new BlogResource($blog),
            "Blog updated successfully",
            200
        );
    }

    public function destroy(Blog $blog): JsonResponse
    {
        $blog = $this->blogCategory_service->destroy($blog);

        return ApiResponse::success(
            new BlogResource($blog),
            "Blog deleted successfully",
            200
        );
    }


    public function show(Blog $blog): JsonResponse
    {
        $email = $this->blogCategory_service->find($blog);

        return ApiResponse::success(
            new BlogResource($email),
            "Blog fetched successfully",
            200
        );
    }
}
