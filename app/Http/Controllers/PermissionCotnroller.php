<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Permission\CreateRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Http\Resources\PermissionResource;
use App\Services\PermissionService;
use App\Support\Messages\PermissionMessages;
class PermissionCotnroller extends BaseController
{
    public function __construct(public PermissionService $permission_service)
    {
        $this->service = $permission_service;
        $this->resource = PermissionResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = PermissionMessages::class;
        $this->model = $permission_service->getModel();
    }
}
