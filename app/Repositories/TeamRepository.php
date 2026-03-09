<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\TeamRepositoryInterface;
use App\Models\Team\Team;
use App\Models\Team\TeamTranslation;
use App\Support\ImageService;
use App\Services\LanguageService;

class TeamRepository implements TeamRepositoryInterface
{
    use CreateHelper, ReadHelper, UpdateHelper, DeleteHelper, FindHelper;

    public function __construct(public Team $model, public TeamTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->translationRelationField = "team_id";
        $this->folderName = "team";
    }
}
