<?php

namespace App\Http\Controllers;

use App\Helpers\DB\Controller\WithoutTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithoutTranslation\FindTrait;
use App\Helpers\DB\Controller\WithoutTranslation\ReadTrait;
use App\Http\Requests\ContactMessageRequest;
use App\Http\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use App\Services\ContactMessageService;
use App\Support\ApiResponse;
use App\Support\Messages\ContactMessageMessages;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactMessageController extends Controller
{
    use ReadTrait, FindTrait, DeleteTrait;
    public function __construct(public ContactMessageService $contact_message_service)
    {
        $this->service = $contact_message_service;
        $this->resource = ContactMessageResource::class;
        $this->create_request = ContactMessageRequest::class;
        $this->messagesModel = ContactMessageMessages::class;
    }
    public function store():JsonResponse {
        $request = app($this->create_request);
        $result = $this->service->store($request->validated());
        
        Mail::send("contact", ["data" => $result], function($message){
            $message->to("agamedov94@mail.ru")->subject("Contact message");
        });
        return ApiResponse::success(
            new $this->resource($result),
            $this->messagesModel::CREATED,
            200
        );
    }
    public function toggleRead(ContactMessage $contactMessage) {
        $message = $this->contact_message_service->toggleRead($contactMessage);
        return ApiResponse::success(
            new ContactMessageResource($message),
            $this->messagesModel::TOGGLE_READ,
            200
        );
    }
}
