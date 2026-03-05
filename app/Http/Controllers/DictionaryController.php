<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Dictionary\CreateRequest;
use App\Http\Requests\Dictionary\UpdateRequest;
use App\Http\Resources\Dictionary\DictionaryResource;
use App\Services\DictionaryService;
use App\Support\Messages\DictionaryMessages;

class DictionaryController extends BaseController
{
    public function __construct(public DictionaryService $dictionary_service)
    {
        $this->service = $dictionary_service;
        $this->resource = DictionaryResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = DictionaryMessages::class;
    }

}
