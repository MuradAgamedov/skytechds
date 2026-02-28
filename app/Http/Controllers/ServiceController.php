<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Services\Service;
use App\Services\ServiceService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class ServiceController extends Controller
{
     public function __construct(public ServiceService $service_service) {}

    public function index(): JsonResponse
    {
        $services = $this->service_service->getWidthPagination(['translations']);

        return ApiResponse::success(
            ServiceResource::collection($services),
            "Services fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $service = $this->service_service->store($request->validated());

        return ApiResponse::success(
            new ServiceResource($service),
            "Service added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Service $service): JsonResponse
    {
        $service = $this->service_service->update($service, $request->validated());
        return ApiResponse::success(
            new ServiceResource($service),
            "Service updated successfully",
            200
        );
    }

    public function destroy(Service $service): JsonResponse
    {
        $service = $this->service_service->destroy($service);

        return ApiResponse::success(
            new ServiceResource($service),
            "Service deleted successfully",
            200
        );
    }


    public function show(Service $service): JsonResponse
    {
        $service = $this->service_service->find($service);

        return ApiResponse::success(
            new ServiceResource($service),
            "Service fetched successfully",
            200
        );
    }
}
