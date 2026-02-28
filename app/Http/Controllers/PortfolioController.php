<?php

namespace App\Http\Controllers;

use App\Http\Requests\Portfolio\CreateRequest;
use App\Http\Requests\Portfolio\UpdateRequest;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Models\Portfolio\Portfolio;
use App\Services\PortfolioService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class PortfolioController extends Controller
{
    public function __construct(public PortfolioService $portfolio_service) {}

    public function index(): JsonResponse
    {
        $blog_categories = $this->portfolio_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            PortfolioResource::collection($blog_categories),
            "Portfolios fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $blogCategory = $this->portfolio_service->store($request->validated());

        return ApiResponse::success(
            new PortfolioResource($blogCategory),
            "Portfolio added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Portfolio $portfolio): JsonResponse
    {
        $portfolio = $this->portfolio_service->update($portfolio, $request->validated());
        return ApiResponse::success(
            new PortfolioResource($portfolio),
            "Portfolio updated successfully",
            200
        );
    }

    public function destroy(Portfolio $portfolio): JsonResponse
    {
        $portfolio = $this->portfolio_service->destroy($portfolio);

        return ApiResponse::success(
            new PortfolioResource($portfolio),
            "Portfolio deleted successfully",
            200
        );
    }


    public function show(Portfolio $portfolio): JsonResponse
    {
        $portfolio = $this->portfolio_service->find($portfolio);

        return ApiResponse::success(
            new PortfolioResource($portfolio),
            "Portfolio fetched successfully",
            200
        );
    }
}
