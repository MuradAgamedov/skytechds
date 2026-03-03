<?php

namespace App\Http\Controllers;

use App\Http\Requests\Statistics\CreateRequest;
use App\Http\Requests\Statistics\UpdateRequest;
use App\Http\Resources\Statistics\StatisticResource;
use App\Models\Statistics\Statistic;
use App\Services\StatisticService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatisticController extends Controller
{
    public function __construct(public StatisticService $statistic_service) {}

    public function index(): JsonResponse
    {
        $blog_categories = $this->statistic_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            StatisticResource::collection($blog_categories),
            "Statistics fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $blogCategory = $this->statistic_service->store($request->validated());

        return ApiResponse::success(
            new StatisticResource($blogCategory),
            "Statistic added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Statistic $statistic): JsonResponse
    {
        $blog = $this->statistic_service->update($statistic, $request->validated());
        return ApiResponse::success(
            new StatisticResource($blog),
            "Statistic updated successfully",
            200
        );
    }

    public function destroy(Statistic $statistic): JsonResponse
    {
        $statistic = $this->statistic_service->destroy($statistic);

        return ApiResponse::success(
            new StatisticResource($statistic),
            "Statistic deleted successfully",
            200
        );
    }


    public function show(Statistic $statistic): JsonResponse
    {
        $statistic = $this->statistic_service->find($statistic);

        return ApiResponse::success(
            new StatisticResource($statistic),
            "Statistic fetched successfully",
            200
        );
    }
}
