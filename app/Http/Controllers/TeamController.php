<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\WithTranslation\BaseController;
use App\Http\Requests\Team\CreateRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Resources\Team\TeamResource;
use App\Services\TeamService as ServicesTeamService;
use App\Support\Messages\TeamMessages;

class TeamController extends BaseController
{
    public function __construct(public ServicesTeamService $team_service) {
        $this->service = $team_service;
        $this->resource = TeamResource::class;
        $this->create_request = CreateRequest::class;
        $this->update_request = UpdateRequest::class;
        $this->messagesModel = TeamMessages::class;
    }
}
