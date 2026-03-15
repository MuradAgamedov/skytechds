<?php

namespace App\Http\Controllers;

use App\Helpers\DB\Controller\WithTranslation\FirstTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Http\Requests\AllSeo\UpdateRequest;
use App\Http\Resources\AllSeoPageResource;
use App\Services\AllSeoService;
use App\Support\Messages\AllSeoMessages;

class AllSeoPageController extends Controller
{
    use FirstTrait, UpdateTrait;
    public function __construct(public AllSeoService $all_seo_service)
    {
        $this->service = $all_seo_service;
        $this->resource = AllSeoPageResource::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = AllSeoMessages::class;
        $this->model = $all_seo_service->getModel();
    }

}
