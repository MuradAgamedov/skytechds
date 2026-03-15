<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PortfolioRepositoryInterface;
use App\Repositories\Base\WithTranslation\BaseCrudRepository;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;

class PortfolioRepository extends BaseCrudRepository implements PortfolioRepositoryInterface
{
    public function __construct(Portfolio $model, PortfolioTranslation $translationModel, LanguageService $languageService, ImageService $image_service) {
        $this->model = $model;
        $this->translationRelationField = "portfolio_id";
    }


}
