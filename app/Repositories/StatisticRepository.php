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

class StatisticRepository implements StatisticRepositoryInterface
{
    use CreateHelper, ReadHelper, UpdateHelper, DeleteHelper, FindHelper;
    public function __construct(public Statistic $model, public StatisticTranslation $translationModel, public LanguageService $languageService) {
        $this->translationRelationField = "statistic_id";
    }

}
