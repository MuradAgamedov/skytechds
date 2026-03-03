<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteInfo\UpdateRequest;
use App\Http\Resources\SiteInfo\SiteInfoResource;
use App\Models\SiteInfo\SiteInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\SiteInfoService;
use App\Support\ApiResponse;

class SiteInfoController extends Controller
{
    public function __construct(public SiteInfoService $site_info_service)
    {
    }

   public function index() {
        $siteInfo = $this->site_info_service->first();

        return ApiResponse::success(
            new SiteInfoResource($siteInfo),
            "Site informations fetched successfully",
            200
        );
    }


    public function update(UpdateRequest $request, SiteInfo $siteInfo):JsonResponse {
        $siteInfo = $this->site_info_service->update($siteInfo, $request->validated());

        return ApiResponse::success(
            new SiteInfoResource($siteInfo),
            "Site informations updated successfully",
            200
        );
    }

    
    

 
}
