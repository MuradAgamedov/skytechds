<?php

namespace App\Http\Controllers;

use App\Http\Requests\About\UpdateRequest;
use App\Http\Resources\About\AboutResource;
use App\Models\About\About;
use App\Services\AboutService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class AboutController extends Controller
{
    public function __construct(public AboutService $site_info_service)
    {
    }

   public function index() {
        $siteInfo = $this->site_info_service->first();

        return ApiResponse::success(
            new AboutResource($siteInfo),
            "About datas fetched successfully",
            200
        );
    }


    public function update(UpdateRequest $request, About $siteInfo):JsonResponse {
        $siteInfo = $this->site_info_service->update($siteInfo, $request->validated());

        return ApiResponse::success(
            new AboutResource($siteInfo),
            "About datas updated successfully",
            200
        );
    }

    
    
}
