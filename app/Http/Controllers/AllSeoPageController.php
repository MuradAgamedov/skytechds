<?php

namespace App\Http\Controllers;

use App\Helpers\DB\Controller\WithTranslation\FirstTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Http\Requests\About\UpdateRequest;
use App\Http\Resources\About\AboutResource;
use App\Services\AllSeoService;
use App\Support\Messages\AllSeoMessages;

class AllSeoPageController extends Controller
{
    use FirstTrait, UpdateTrait;
    public function __construct(public AllSeoService $all_seo_service)
    {
        $this->service = $all_seo_service;
        $this->resource = AboutResource::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = AllSeoMessages::class;
    }
    
}
