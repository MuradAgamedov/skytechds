<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialNetwork\CreateRequest;
use App\Http\Requests\SocialNetwork\UpdateRequest;
use App\Http\Resources\SocialNetworkResource;
use App\Services\SocialNetworkService;
use App\Models\SocialNetwork;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class SocialNetworksController extends Controller
{
     public function __construct(public SocialNetworkService $social_networks_service)
    {
    }

    public function index():JsonResponse {
        $socialNetworks = $this->social_networks_service->getWidthPagination();

        return ApiResponse::success(
            SocialNetworkResource::collection($socialNetworks),
            "SocialNetworks fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $socialNetworks = $this->social_networks_service->store($request->validated());

        return ApiResponse::success(
            new SocialNetworkResource($socialNetworks),
            "SocialNetworks added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, SocialNetwork $socialNetwork):JsonResponse {
        $socialNetwork = $this->social_networks_service->update($socialNetwork, $request->validated());

        return ApiResponse::success(
            new SocialNetworkResource($socialNetwork),
            "SocialNetworks updated successfully",
            200
        );
    }

    public function destroy(SocialNetwork $socialNetwork):JsonResponse {
        $socialNetwork = $this->social_networks_service->destroy($socialNetwork);

        return ApiResponse::success(
            new SocialNetworkResource($socialNetwork),
            "SocialNetworks deleted successfully",
            200
        );
    }
    

    public function show(SocialNetwork $socialNetwork) {
         $socialNetwork = $this->social_networks_service->find($socialNetwork);

        return ApiResponse::success(
            new SocialNetworkResource($socialNetwork),
            "SocialNetworks fetched successfully",
            200
        );
    }
}
