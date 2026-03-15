<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Language\CreateRequest;
use App\Http\Requests\Language\UpdateRequest;
use App\Http\Resources\LanguageResource;
use App\Services\LanguageService;
use App\Support\Messages\LanguageMessages;

class LanguageController extends BaseController
{
    public function __construct(public LanguageService $email_service)
    {
        $this->service = $email_service;
        $this->resource = LanguageResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = LanguageMessages::class;
        $this->model = $email_service->getModel();
    }
}
