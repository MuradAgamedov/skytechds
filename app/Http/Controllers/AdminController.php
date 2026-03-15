<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithoutTranslation\BaseController;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\AdminService;
use App\Support\ApiResponse;
use App\Support\Messages\AdminMessages;
use Symfony\Component\HttpFoundation\JsonResponse;
class AdminController extends BaseController
{
    public function __construct(public AdminService $admin_service)
    {
        $this->service = $admin_service;
        $this->resource = UserResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = AdminMessages::class;
        $this->model = $admin_service->getModel();
        $this->with = ['roles'];
    }
}
