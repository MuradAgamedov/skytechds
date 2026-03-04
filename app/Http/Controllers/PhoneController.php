<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Phone\CreateRequest;
use App\Http\Requests\Phone\UpdateRequest;
use App\Http\Resources\PhoneResource;
use App\Services\PhoneService;
use App\Support\Messages\PhoneMessages;

class PhoneController extends BaseController
{
    public function __construct(public PhoneService $email_service)
    {
        $this->service = $email_service;
        $this->resource = PhoneResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = PhoneMessages::class;
    }
}
