<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Email\CreateRequest;
use App\Http\Requests\Email\UpdateRequest;
use App\Http\Resources\EmailResource;
use App\Services\EmailService;
use App\Support\Messages\EmailMessages;

class EmailController extends BaseController
{
    public function __construct(public EmailService $email_service)
    {
        $this->service = $email_service;
        $this->resource = EmailResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = EmailMessages::class;
    }

    
}
