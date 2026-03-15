<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Services\ServiceService;
use App\Support\Messages\ServiceMessages;

class ServiceController extends BaseController
{
    public function __construct(public ServiceService $service_service) {
        $this->service = $service_service;
        $this->resource = ServiceResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = ServiceMessages::class;
        $this->model = $service_service->getModel();    
    }
}
