<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Http\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use App\Services\ContactMessageService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactMessageController extends Controller
{
      public function __construct(public ContactMessageService $contact_message_service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phones = $this->contact_message_service->getWidthPagination();
        return ApiResponse::success(
            ContactMessageResource::collection($phones),
            "Messages fetched successfully",
            200
        );
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactMessageRequest $request):JsonResponse
    {
        $message = $this->contact_message_service->store($request->validated());

        return ApiResponse::success(
            new ContactMessageResource($message),
            "Message sended successfully",
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $message)
    {
        $message = $this->contact_message_service->find($message);

        return ApiResponse::success(
            new ContactMessageResource($message),
            "Message fetched successfully",
            200
        );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $message):JsonResponse
    {
        $message = $this->contact_message_service->destroy($message);

        
        return ApiResponse::success(
            new ContactMessageResource($message),
            "Message deleted successfully",
            200
        );
    }


    public function toggleRead(ContactMessage $contactMessage) {
        $message = $this->contact_message_service->toggleRead($contactMessage);

        
        return ApiResponse::success(
            new ContactMessageResource($message),
            "Message read status has been updated",
            200
        );
    }
}
