<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faq\CreateRequest;
use App\Http\Requests\Faq\UpdateRequest;
use App\Http\Resources\Faq\FaqResource;
use App\Models\Faq\Faq;
use App\Services\FaqService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class FaqController extends Controller
{
         public function __construct(public FaqService $faq_service)
    {
    }

    public function index():JsonResponse {
        $addresses = $this->faq_service->getWidthPagination(['translations']);
        
        return ApiResponse::success(
            FaqResource::collection($addresses),
            "FAQs fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $email = $this->faq_service->store($request->validated());

        return ApiResponse::success(
            new FaqResource($email),
            "FAQ added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Faq $faq):JsonResponse {
        $address = $this->faq_service->update($faq, $request->validated());

        return ApiResponse::success(
            new FaqResource($address),
            "FAQ updated successfully",
            200
        );
    }

    public function destroy(Faq $faq):JsonResponse {
        $faq = $this->faq_service->destroy($faq);

        return ApiResponse::success(
            new FaqResource($faq),
            "FAQ deleted successfully",
            200
        );
    }
    

    public function show(Faq $faq) {
         $faq = $this->faq_service->find($faq);

        return ApiResponse::success(
            new FaqResource($faq),
            "FAQ fetched successfully",
            200
        );
    }
}
