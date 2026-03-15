<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Helpers\DB\Controller\WithTranslation\FirstTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Http\Requests\SiteInfo\UpdateRequest;
use App\Http\Resources\SiteInfo\SiteInfoResource;
use App\Services\SiteInfoService;
use App\Support\Messages\SiteInfoMessages;

class SiteInfoController extends BaseController
{
    use FirstTrait, UpdateTrait;
    public function __construct(public SiteInfoService $site_info_service)
    {
        $this->service = $site_info_service;
        $this->resource = SiteInfoResource::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = SiteInfoMessages::class;
        $this->model = $site_info_service->getModel();    
    }
}
