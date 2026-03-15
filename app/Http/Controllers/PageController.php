<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Page\CreateRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Http\Resources\Page\PageResource;
use App\Services\PageService;
use App\Support\Messages\PageMessages;

class PageController extends BaseController
{
    public function __construct(public PageService $page_service)
    {
        $this->service = $page_service;
        $this->resource = PageResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = PageMessages::class;
        $this->model = $page_service->getModel();
    }
}
