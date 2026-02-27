<?php

namespace App\Http\Controllers;

use App\Http\Requests\Map\CreateRequest;
use App\Http\Requests\Map\UpdateRequest;
use App\Http\Resources\MaPResource;
use App\Models\Map;
use App\Services\MapService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class MapController extends Controller
{
    public function __construct(public MapService $map_service)
    {
    }

    public function index():JsonResponse {
        $maps = $this->map_service->getWidthPagination();

        return ApiResponse::success(
            MaPResource::collection($maps),
            "Maps fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $map = $this->map_service->store($request->validated());

        return ApiResponse::success(
            new MaPResource($map),
            "Map added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Map $map):JsonResponse {
        $map = $this->map_service->update($map, $request->validated());

        return ApiResponse::success(
            new MaPResource($map),
            "Map updated successfully",
            200
        );
    }

    public function destroy(Map $map):JsonResponse {
        $map = $this->map_service->destroy($map);

        return ApiResponse::success(
            new MaPResource($map),
            "Map deleted successfully",
            200
        );
    }
    

    public function show(Map $map) {
         $map = $this->map_service->find($map);

        return ApiResponse::success(
            new MaPResource($map),
            "Map fetched successfully",
            200
        );
    }
}
