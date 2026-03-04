<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Blog\CreateRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Http\Resources\BlogCategory\BlogCategoryResource;
use App\Services\BlogService;
use App\Support\Messages\BlogMessages;

class BlogController extends BaseController
{
    public function __construct(public BlogService $blog_service) {
        $this->service = $blog_service;
        $this->resource = BlogCategoryResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = BlogMessages::class;
    }

   
}
