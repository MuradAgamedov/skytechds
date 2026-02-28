<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategory\CreateRequest;
use App\Http\Requests\BlogCategory\UpdateRequest;
use App\Http\Resources\BlogCategory\BlogCategoryResource;
use App\Models\BlogCategory\BlogCategory;
use App\Services\BlogCategoryService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogCategoryController extends Controller
{
    public function __construct(public BlogCategoryService $blogCategory_service) {}

    public function index(): JsonResponse
    {
        $blog_categories = $this->blogCategory_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            BlogCategoryResource::collection($blog_categories),
            "Blog Categories fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $blogCategory = $this->blogCategory_service->store($request->validated());

        return ApiResponse::success(
            new BlogCategoryResource($blogCategory),
            "Blog Category added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, BlogCategory $blogCategory): JsonResponse
    {
        $blogCategory = $this->blogCategory_service->update($blogCategory, $request->validated());

        return ApiResponse::success(
            new BlogCategoryResource($blogCategory),
            "Blog Category updated successfully",
            200
        );
    }

    public function destroy(BlogCategory $blogCategory): JsonResponse
    {
        $blogCategory = $this->blogCategory_service->destroy($blogCategory);

        return ApiResponse::success(
            new BlogCategoryResource($blogCategory),
            "Blog Category deleted successfully",
            200
        );
    }


    public function show(BlogCategory $blogCategory): JsonResponse
    {
        $email = $this->blogCategory_service->find($blogCategory);

        return ApiResponse::success(
            new BlogCategoryResource($email),
            "Blog Category fetched successfully",
            200
        );
    }
}
