<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Dictionary\CreateRequest;
use App\Http\Requests\Dictionary\UpdateRequest;
use App\Http\Resources\BlogCategory\BlogCategoryResource;
use App\Services\DictionaryService;


class DictionaryController extends BaseController
{
    public function __construct(public DictionaryService $dictionary_service)
    {
        $this->service = $dictionary_service;
        $this->resource = BlogCategoryResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
    }

}
