<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\SocialNetwork\CreateRequest;
use App\Http\Requests\SocialNetwork\UpdateRequest;
use App\Http\Resources\SocialNetworkResource;
use App\Services\SocialNetworkService;
use App\Support\Messages\SocialNetworkMessages;

class SocialNetworksController extends BaseController
{
    public function __construct(public SocialNetworkService $email_service)
    {
        $this->service = $email_service;
        $this->resource = SocialNetworkResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = SocialNetworkMessages::class;
        $this->model = $email_service->getModel();
    }
}
