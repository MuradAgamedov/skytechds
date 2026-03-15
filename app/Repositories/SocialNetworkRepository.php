<?php

namespace App\Repositories;

use App\Helpers\DB\WithoutTranslation\CreateHelper;
use App\Helpers\DB\WithoutTranslation\DeleteHelper;
use App\Helpers\DB\WithoutTranslation\FindHelper;
use App\Helpers\DB\WithoutTranslation\ReadHelper;
use App\Helpers\DB\WithoutTranslation\UpdateHelper;
use App\Interfaces\Repositories\SocialNetworkRepositoryInterface;
use App\Models\SocialNetwork;

class SocialNetworkRepository implements SocialNetworkRepositoryInterface{
    use ReadHelper, CreateHelper, UpdateHelper, DeleteHelper, FindHelper;
    public function __construct(public SocialNetwork $model)
    {
    }

    public function getModel() {
        return $this->model;
    }

}
