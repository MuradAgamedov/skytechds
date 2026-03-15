<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Http\Resources\Tag\TagResource;
use App\Services\TagService;
use App\Support\Messages\TagMessages;

class TagController extends BaseController
{
    public function __construct(public TagService $tag_service)
    {
        $this->service = $tag_service;
        $this->resource = TagResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = TagMessages::class;
        $this->model = $tag_service->getModel();
    }
}
