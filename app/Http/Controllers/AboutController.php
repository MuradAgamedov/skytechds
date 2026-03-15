<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Helpers\DB\Controller\WithTranslation\FirstTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Http\Requests\About\UpdateRequest;
use App\Http\Resources\About\AboutResource;
use App\Services\AboutService;
use App\Support\Messages\AboutMessages;

class AboutController extends BaseController
{
    use FirstTrait, UpdateTrait;
    public function __construct(public AboutService $site_info_service)
    {
        $this->service = $site_info_service;
        $this->resource = AboutResource::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = AboutMessages::class;
        $this->model = $site_info_service->getModel();
    }

}
