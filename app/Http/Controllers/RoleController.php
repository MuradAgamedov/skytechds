<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Http\Resources\RoleResource;
use App\Services\RoleService;
use App\Support\Messages\RoleMessages;

class RoleController extends BaseController
{
    public function __construct(public RoleService $role_service)
    {
        $this->service = $role_service;
        $this->resource = RoleResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = RoleMessages::class;
        $this->with = ['permissions'];
    }
}
