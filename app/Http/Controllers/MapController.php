<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Map\CreateRequest;
use App\Http\Requests\Map\UpdateRequest;
use App\Http\Resources\MaPResource;
use App\Services\MapService;
use App\Support\Messages\MapMessages;

class MapController extends BaseController
{
   public function __construct(public MapService $email_service)
    {
        $this->service = $email_service;
        $this->resource = MaPResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = MapMessages::class;
        $this->model = $email_service->getModel();
    }
}
