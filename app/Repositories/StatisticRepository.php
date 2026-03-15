<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StatisticRepositoryInterface;
use App\Models\Statistics\Statistic;
use App\Models\Statistics\StatisticTranslation;
use App\Services\LanguageService;
use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Support\ImageService;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
class StatisticRepository extends BaseCrudRepository implements StatisticRepositoryInterface
{
    public function __construct(Statistic $model, public StatisticTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {
        $this->translationRelationField = "statistic_id";
        $this->folderName = "statistics";
        $this->model = $model;
    }

}
