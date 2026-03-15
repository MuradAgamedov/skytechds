<?php

namespace App\Repositories;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
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

class TeamRepository extends BaseCrudRepository implements TeamRepositoryInterface
{

    public function __construct(Team $model, public TeamTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->translationRelationField = "team_id";
        $this->folderName = "team";
        $this->model = $model;
    }
}
