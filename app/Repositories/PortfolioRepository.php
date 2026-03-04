<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\CreateHelper;
use App\Helpers\DB\WithTranslation\DeleteHelper;
use App\Helpers\DB\WithTranslation\FindHelper;
use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Interfaces\Repositories\PortfolioRepositoryInterface;

use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioTranslation;
use App\Services\LanguageService;


class PortfolioRepository implements PortfolioRepositoryInterface
{
    use ReadHelper, CreateHelper, UpdateHelper, DeleteHelper, FindHelper;
    public function __construct(public Portfolio  $model, public PortfolioTranslation $translationModel, public LanguageService $languageService) {
        $this->folderName = "portfolios";
        $this->translationRelationField = "portfolio_id";
    }
    

}
