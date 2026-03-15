<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Statistics\CreateRequest;
use App\Http\Requests\Statistics\UpdateRequest;
use App\Http\Resources\Statistics\StatisticResource;
use App\Services\StatisticService;
use App\Support\Messages\StatisticMessages;

class StatisticController extends BaseController
{
    public function __construct(public StatisticService $statistic_service) {
        $this->service = $statistic_service;
        $this->resource = StatisticResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = StatisticMessages::class;
        $this->model = $statistic_service->getModel();
    }


}
