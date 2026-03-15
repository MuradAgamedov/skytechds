<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Portfolio\CreateRequest;
use App\Http\Requests\Portfolio\UpdateRequest;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Services\PortfolioService;
use App\Support\Messages\PortfolioMessages;

class PortfolioController extends BaseController
{
    public function __construct(public PortfolioService $portfolio_service) {
        $this->service = $portfolio_service;
        $this->resource = PortfolioResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = PortfolioMessages::class;
        $this->model = $portfolio_service->getModel();
    }
}
