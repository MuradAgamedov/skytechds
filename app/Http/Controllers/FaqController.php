<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Faq\CreateRequest;
use App\Http\Requests\Faq\UpdateRequest;
use App\Http\Resources\Faq\FaqResource;
use App\Services\FaqService;
use App\Support\Messages\FaqMessages;

class FaqController extends BaseController
{
    public function __construct(public FaqService $faq_service)
    {
        $this->service = $faq_service;
        $this->resource = FaqResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = FaqMessages::class;
        $this->model = $faq_service->getModel();
    }
}
