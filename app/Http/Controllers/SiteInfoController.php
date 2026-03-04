<?php

namespace App\Http\Controllers;

use App\Helpers\DB\Controller\WithTranslation\FirstTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Http\Requests\SiteInfo\UpdateRequest;
use App\Http\Resources\SiteInfo\SiteInfoResource;

use App\Services\SiteInfoService;

class SiteInfoController extends Controller
{
    use FirstTrait, UpdateTrait;
    public function __construct(public SiteInfoService $site_info_service)
    {
        $this->service = $site_info_service;
        $this->resource = SiteInfoResource::class;
        $this->update_request = UpdateRequest::class;
    }

   
 
}
