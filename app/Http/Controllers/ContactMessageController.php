<?php

namespace App\Http\Controllers;

use App\Helpers\DB\Controller\WithoutTranslation\CreateTrait;
use App\Helpers\DB\Controller\WithoutTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithoutTranslation\FindTrait;
use App\Helpers\DB\Controller\WithoutTranslation\ReadTrait;
use App\Http\Requests\ContactMessageRequest;
use App\Http\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use App\Services\ContactMessageService;
use App\Support\ApiResponse;
use App\Support\Messages\ContactMessageMessages;

class ContactMessageController extends Controller
{
    use ReadTrait, CreateTrait, FindTrait, DeleteTrait;
    public function __construct(public ContactMessageService $contact_message_service)
    {
        $this->service = $contact_message_service;
        $this->resource = ContactMessageResource::class;
        $this->create_request = ContactMessageRequest::class;
        $this->messagesModel = ContactMessageMessages::class;
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
