<?php

namespace App\Http\Controllers;

use App\Http\Resources\Dictionary\DictionaryResource;
use App\Http\Requests\Dictionary\CreateRequest;
use App\Http\Requests\Dictionary\UpdateRequest;
use App\Models\Dictionary\Dictionary;
use App\Services\DictionaryService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class DictionaryController extends Controller
{
      public function __construct(public DictionaryService $dictionary_service)
    {
    }

    public function index():JsonResponse {
        $dictionaries = $this->dictionary_service->getWidthPagination(['translations']);
        
        return ApiResponse::success(
            DictionaryResource::collection($dictionaries),
            "Dictionaries fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $dictionary = $this->dictionary_service->store($request->validated());

        return ApiResponse::success(
            new DictionaryResource($dictionary),
            "Dictionary added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Dictionary $dictionary):JsonResponse {
        $dictionary = $this->dictionary_service->update($dictionary, $request->validated());

        return ApiResponse::success(
            new DictionaryResource($dictionary),
            "Dictionary updated successfully",
            200
        );
    }

    public function destroy(Dictionary $dictionary):JsonResponse {
        $dictionary = $this->dictionary_service->destroy($dictionary);

        return ApiResponse::success(
            new DictionaryResource($dictionary),
            "Dictionary deleted successfully",
            200
        );
    }
    

    public function show(Dictionary $dictionary) {
         $dictionary = $this->dictionary_service->find($dictionary);

        return ApiResponse::success(
            new DictionaryResource($dictionary),
            "Dictionary fetched successfully",
            200
        );
    }
}
