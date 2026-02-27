<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\CreateRequest;
use App\Http\Requests\Language\UpdateRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use App\Services\LanguageService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class LanguageController extends Controller
{
     public function __construct(public LanguageService $language_service)
    {
    }

    public function index():JsonResponse {
        $languages = $this->language_service->getWidthPagination();

        return ApiResponse::success(
            LanguageResource::collection($languages),
            "Languages fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $language = $this->language_service->store($request->validated());

        return ApiResponse::success(
            new LanguageResource($language),
            "Language added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Language $language):JsonResponse {
        $language = $this->language_service->update($language, $request->validated());

        return ApiResponse::success(
            new LanguageResource($language),
            "Maps updated successfully",
            200
        );
    }

    public function destroy(Language $language):JsonResponse {
        $language = $this->language_service->destroy($language);

        return ApiResponse::success(
            new LanguageResource($language),
            "Maps deleted successfully",
            200
        );
    }
    

    public function show(Language $language) {
         $language = $this->language_service->find($language);

        return ApiResponse::success(
            new LanguageResource($language),
            "Map fetched successfully",
            200
        );
    }
}
