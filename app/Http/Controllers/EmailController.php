<?php

namespace App\Http\Controllers;

use App\Http\Requests\Email\CreateRequest;
use App\Http\Requests\Email\UpdateRequest;
use App\Http\Resources\EmailResource;
use App\Models\Email;
use App\Services\EmailService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmailController extends Controller
{
    public function __construct(public EmailService $email_service)
    {
    }

    public function index():JsonResponse {
        $emails = $this->email_service->getWidthPagination();

        return ApiResponse::success(
            EmailResource::collection($emails),
            "Emails fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $email = $this->email_service->store($request->validated());

        return ApiResponse::success(
            new EmailResource($email),
            "Email added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Email $email):JsonResponse {
        $email = $this->email_service->update($email, $request->validated());

        return ApiResponse::success(
            new EmailResource($email),
            "Email updated successfully",
            200
        );
    }

    public function destroy(Email $email):JsonResponse {
        $email = $this->email_service->destroy($email);

        return ApiResponse::success(
            new EmailResource($email),
            "Email deleted successfully",
            200
        );
    }
    

    public function show(Email $email) {
         $email = $this->email_service->find($email);

        return ApiResponse::success(
            new EmailResource($email),
            "Email fetched successfully",
            200
        );
    }
}
