<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\BlogCategory\CreateRequest;
use App\Http\Requests\BlogCategory\UpdateRequest;
use App\Http\Resources\BlogCategory\BlogCategoryResource;
use App\Services\BlogCategoryService;
use App\Support\Messages\BlogCategoryMessages;

class BlogCategoryController extends BaseController
{
    public function __construct(public BlogCategoryService $blogCategory_service) {
        $this->service = $blogCategory_service;
        $this->resource = BlogCategoryResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = BlogCategoryMessages::class;
        $this->model = $blogCategory_service->getModel();
    }
}
