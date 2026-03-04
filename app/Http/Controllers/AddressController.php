<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Address\CreateRequest;
use App\Http\Requests\Address\UpdateRequest;
use App\Http\Resources\Address\AddressResource;
use App\Services\AddressService;
use App\Support\Messages\AddressMessages;

class AddressController extends BaseController
{
    public function __construct(public AddressService $address_service)
    {
        $this->service = $address_service;
        $this->resource = AddressResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = AddressMessages::class;
    }
}
